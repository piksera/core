<?php

namespace PikseraPackages\Admin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PikseraPackages\Admin\Services\AdminManager
 * @mixin \PikseraPackages\Admin\Services\AdminManager
 */
class AdminManager extends Facade
{
    public static function getFacadeAccessor()
    {
        return \PikseraPackages\Admin\Services\AdminManager::class;
    }
}
