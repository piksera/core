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

namespace PikseraPackages\Database;

use Illuminate\Support\ServiceProvider;


class DatabaseManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {


        \Event::listen(['eloquent.saved: *', 'eloquent.created: *', 'eloquent.deleted: *'], function ($context) {
            app()->database_manager->clearCache();
        });


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
        /**
         * @property \PikseraPackages\Database\DatabaseManager $database_manager
         */
        $this->app->singleton('database_manager', function ($app) {
            return new DatabaseManager($app);
        });
    }

}
