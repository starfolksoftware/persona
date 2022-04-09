# Introduction

A simple, elagant and straight-foward user permissions package for you Laravel applications.

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
