<?php

namespace StarfolkSoftware\Persona\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \StarfolkSoftware\Persona\Persona
 */
class Persona extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'persona';
    }
}
