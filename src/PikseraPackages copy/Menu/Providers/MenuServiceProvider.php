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

namespace PikseraPackages\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\Menu\MenuManager;
use PikseraPackages\Menu\Models\Menu;
use PikseraPackages\Menu\Repositories\MenuRepository;
use PikseraPackages\Menu\TranslateTables\TranslateMenu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
        /**
         * @property \PikseraPackages\Menu\MenuManager    $menu_manager
         */
        $this->app->singleton('menu_manager', function ($app) {
            return new MenuManager();
        });

        $this->app->resolving(\PikseraPackages\Repository\RepositoryManager::class, function (\PikseraPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Menu::class, function () {
                return new MenuRepository();
            });
        });

        /**
         * @property MenuRepository   $menu_repository
         */
        $this->app->bind('menu_repository', function ($app) {
            return $this->app->repository_manager->driver(Menu::class);;
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->translate_manager->addTranslateProvider(TranslateMenu::class);



        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');



    }
}
