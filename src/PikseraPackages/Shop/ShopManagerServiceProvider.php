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

namespace PikseraPackages\Shop;

use Illuminate\Support\ServiceProvider;

class ShopManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \PikseraPackages\Shop    $shop_manager
         */
        $this->app->singleton('shop_manager', function ($app) {
            return new ShopManager();
        });

        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }
}
