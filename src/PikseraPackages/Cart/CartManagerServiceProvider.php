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

namespace PikseraPackages\Cart;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use PikseraPackages\Cart\Models\Cart;
use PikseraPackages\Cart\Repositories\CartRepository;

class CartManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * @property \PikseraPackages\Cart\CartManager    $cart_manager
         */
        $this->app->singleton('cart_manager', function ($app) {
            return new CartManager();
        });

        $this->app->resolving(\PikseraPackages\Repository\RepositoryManager::class, function (\PikseraPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Cart::class, function () {
                return new CartRepository();
            });
        });

        /**
         * @property CartRepository   $cart_repository
         */
        $this->app->bind('cart_repository', function () {
            return $this->app->repository_manager->driver(Cart::class);;
        });

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cart_manager'];
    }
}
