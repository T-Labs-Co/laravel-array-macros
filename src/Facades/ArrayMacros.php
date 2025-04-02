<?php

namespace TLabsCo\ArrayMacros\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TLabsCo\ArrayMacros\ArrayMacros
 */
class ArrayMacros extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \TLabsCo\ArrayMacros\ArrayMacros::class;
    }
}
