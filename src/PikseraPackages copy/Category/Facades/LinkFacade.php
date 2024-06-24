<?php
namespace PikseraPackages\Option\Facades;

use Illuminate\Support\Facades\Facade;

class OptionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'option';
    }
}