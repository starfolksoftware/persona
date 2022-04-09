<?php

namespace StarfolkSoftware\Persona;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use StarfolkSoftware\Persona\Commands\PersonaCommand;

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
            ->hasMigration('create_persona_table')
            ->hasCommand(PersonaCommand::class);
    }
}
