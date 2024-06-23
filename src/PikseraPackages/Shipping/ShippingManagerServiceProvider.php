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

namespace PikseraPackages\Shipping;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use PikseraPackages\App\Application;

class ShippingManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        /**
         * @property ShippingManager $shipping_manager
         */

        $this->app->singleton('shipping_manager', function ($app) {
            /**
             * @var Application $app
             */
            return new ShippingManager($app->make(Container::class));
        });

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

    }
}
