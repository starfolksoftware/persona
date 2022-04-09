<?php

namespace StarfolkSoftware\Persona;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PersonaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('persona')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_persona_table');
    }

    public function packageBooted()
    {
        // register all roles
        collect(config('persona.roles', []))->each(
            fn ($role) => Persona::role(
                $role['key'],
                $role['name'],
                $role['permissions'] ?? []
            )
        );

        // register all permissions
        $permissions = collect(config('persona.roles', []))->flatMap(
            fn ($role) => $role['permissions'] ?? []
        )->unique()->sort()->values()->all();

        Persona::permissions($permissions);
    }
}
