<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Queue\Providers;

use Illuminate\Support\ServiceProvider;

class QueueServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        /*
        app()->terminating(function () {
            $scheduler = new Event();
            $scheduler->registerShutdownEvent(function () {
                app()->make("\PikseraPackages\Queue\Http\Controllers\ProcessQueueController")->handle();
            });
        });*/

    }
}

