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

namespace PikseraPackages\Payment;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use PikseraPackages\App\Application;

class PaymentManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        /**
         * @property PaymentManager $payment_manager
         */

        $this->app->singleton('payment_manager', function ($app) {
            /**
             * @var Application $app
             */
            return new PaymentManager($app->make(Container::class));
        });



    }
}
