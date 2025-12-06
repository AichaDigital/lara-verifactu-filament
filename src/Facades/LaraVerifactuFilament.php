<?php

namespace AichaDigital\LaraVerifactuFilament\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AichaDigital\LaraVerifactuFilament\LaraVerifactuFilament
 */
class LaraVerifactuFilament extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AichaDigital\LaraVerifactuFilament\LaraVerifactuFilament::class;
    }
}
