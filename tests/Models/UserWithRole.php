<?php

namespace StarfolkSoftware\Persona\Tests\Models;

use Illuminate\Foundation\Auth\User;
use StarfolkSoftware\Persona\HasRole;

class UserWithRole extends User
{
    use HasRole;

    protected $table = 'users';
}
