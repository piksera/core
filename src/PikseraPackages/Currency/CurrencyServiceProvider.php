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

namespace PikseraPackages\Currency;


use Illuminate\Support\ServiceProvider;
use PikseraPackages\Core\Providers\Concerns\MergesConfig;

class CurrencyServiceProvider extends ServiceProvider
{
    use MergesConfig;
    public function register()
    {

        $this->mergeConfigFrom(__DIR__ . '/config/money.php', 'money');


    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/');
    }


}
