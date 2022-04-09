<p align="center"><img width="200" src="https://user-images.githubusercontent.com/4984175/162582621-80d3d4ec-83c8-4614-b429-e893af474ce9.png" alt="Logo Kalibrant"></p>

<p align="center">
    <a href="https://github.com/starfolksoftware/persona/actions">
        <img src="https://github.com/starfolksoftware/persona/actions/workflows/run-tests.yml/badge.svg" alt="Build Status">
    </a>
    <a href="https://github.com/starfolksoftware/persona/actions">
        <img src="https://github.com/starfolksoftware/persona/actions/workflows/php-cs-fixer.yml/badge.svg" alt="Build Status">
    </a>
    <a href="https://github.com/starfolksoftware/persona/actions">
        <img src="https://github.com/starfolksoftware/persona/actions/workflows/phpstan.yml/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/starfolksoftware/persona">
        <img src="https://img.shields.io/packagist/dt/starfolksoftware/persona" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/starfolksoftware/persona">
        <img src="https://img.shields.io/packagist/v/starfolksoftware/persona" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/starfolksoftware/persona">
        <img src="https://img.shields.io/packagist/l/starfolksoftware/persona" alt="License">
    </a>
</p>

# Introduction


A simple, elagant and straight-foward user permissions package for your Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require starfolksoftware/persona
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="persona-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="persona-config"
```

This is the contents of the published config file:

```php
return [
    'roles' => [
        // 'owner' => [
        //     'key' => 'owner',
        //     'name' => 'Owner',
        //     'permissions' => ['*'],
        // ],
    ],
];
```

## Usage

Add the `HasRole` trait to your user model:

```php
use StarfolkSoftware\Persona\HasRole;

class User extends Authenticatable
{
    use HasRole;

    // ...
}
```

Register your roles and permissions in the config file:

```php
return [
    'roles' => [
        'owner' => [
            'key' => 'owner', // must be unique
            'name' => 'Owner',
            'permissions' => ['*'],
        ],
    ],
];
```

You can check if a user has a particular permission as in the following:

```php
$user->hasPermission('post:edit');
```

Giving the `permissions` key the value `'*'` means the `hasPermission(...)` method will always return true.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Faruk Nasir](https://github.com/frknasir)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
