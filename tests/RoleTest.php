<?php

use StarfolkSoftware\Persona\Tests\Models\UserWithRole;

test('user role can be retrieved', function () {
    $user = UserWithRole::first();

    expect($user->role)->toBe('cashier');

    expect($user->hasRole('cashier'))->toBe(true);
});

test('user permission can be checked', function () {
    $user = UserWithRole::first();

    expect($user->hasPermission('products:create'))->toBe(true);

    expect($user->hasPermission('non-existing-permission'))->toBe(false);
});

test('a default role can be set', function () {
    $user = UserWithRole::forceCreate([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'test',
        'role' => 'cashier',
    ]);

    expect($user->role)->toBe('cashier');
    expect($user->hasRole('cashier'))->toBe(true);
    expect($user->hasRole('owner'))->toBe(false);
    expect($user->name)->toBe('Test User');
    expect($user->email)->toBe('test@example.com');
});
