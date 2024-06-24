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

namespace PikseraPackages\Role;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use PikseraPackages\Role\Http\Controllers\IndexController;
use PikseraPackages\Role\Http\Controllers\RoleController;


class RoleServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/permission.php', 'permission');

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');

        View::addNamespace('role', __DIR__ . '/resources/views');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
    }


    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, array_merge($config, require $path,));
    }
}
