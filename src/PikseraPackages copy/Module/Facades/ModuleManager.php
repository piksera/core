<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Module\Facades;

use Illuminate\Support\Facades\Facade;

class ModuleManager extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'module_manager';
    }
}