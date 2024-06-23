<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/piksera/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Module\Facades;

use Illuminate\Support\Facades\Facade;
/**
 * Class ModuleAdmin
 *
 * @method static void registerSettingsComponent(string $moduleType, string $componentName)
 * @method static void registerSkinSettingsComponent(string $moduleType, string $skinName, string $componentName)
 * @method static void registerSettings(string $moduleType, string $componentAlias)
 * @method static void registerSkinSettings(string $moduleType, string $skinName, string $componentAlias)
 * @method static string|null getSettings(string $moduleType)
 * @method static string|null getSkinSettings(string $moduleName, string $skinName)
 * @method static string|null getSettingsComponent(string $moduleName)
 * @method static string|null getSkinSettingsComponent(string $moduleName, string $skinName)
 * @see \PikseraPackages\Module\ModuleAdminManager
 */
class ModuleAdmin extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'module_admin_manager';
    }
}
