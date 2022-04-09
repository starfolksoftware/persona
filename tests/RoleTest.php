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
