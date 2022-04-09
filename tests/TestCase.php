<?php

namespace StarfolkSoftware\Persona\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use StarfolkSoftware\Persona\PersonaServiceProvider;
use StarfolkSoftware\Persona\Tests\Models\UserWithRole;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'StarfolkSoftware\\Persona\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        $this->loadLaravelMigrations(['--database' => 'sqlite']);
        $this->setUpDatabase();
        $this->createUser();
    }

    protected function getPackageProviders($app)
    {
        return [
            PersonaServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('auth.providers.users.model', UserWithRole::class);
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        config()->set('app.key', 'base64:6Cu/ozj4gPtIjmXjr8EdVnGFNsdRqZfHfVjQkmTlg4Y=');

        config()->set('persona.roles', [
            'cashier' => [
                'key' => 'cashier',
                'name' => 'Cashier',
                'permissions' => [
                    'products:create',
                    'products:read',
                    'products:update',
                    'products:delete',
                ],
            ],
        ]);
    }

    protected function setUpDatabase()
    {
        $migration = include __DIR__.'/../database/migrations/create_persona_table.php.stub';
        $migration->up();
    }

    protected function createUser()
    {
        UserWithRole::forceCreate([
            'name' => 'Faruk Nasir',
            'email' => 'faruk@starfolksoftware.com',
            'password' => 'test',
            'role' => 'cashier',
        ]);
    }
}
