<?php
namespace PikseraPackages\Option\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \PikseraPackages\Option\Models\Option
 */
class Option extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'option';
    }
}