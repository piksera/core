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

namespace PikseraPackages\Content;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\Content\Repositories\ContentRepositoryApi;
use PikseraPackages\Content\Repositories\ContentRepository;
use PikseraPackages\Content\Models\Content;


class ContentManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . DS . 'migrations');
        $this->loadRoutesFrom(__DIR__ . DS . 'routes' . DS . 'api.php');
        $this->loadRoutesFrom(__DIR__ . DS . 'routes' . DS . 'web.php');
        /**
         * @property ContentRepository   $content_repository
         */
        $this->app->bind('content_repository', function ($app) {
            return $this->app->repository_manager->driver(\PikseraPackages\Content\Models\Content::class);;
        });


        $this->app->resolving(\PikseraPackages\Repository\RepositoryManager::class, function (\PikseraPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(\PikseraPackages\Content\Models\Content::class, function () {
                return new ContentRepository();
            });
        });


        /**
         * @property \PikseraPackages\Content\ContentManager    $content_manager
         */
        $this->app->singleton('content_manager', function ($app) {
            return new ContentManager();
        });

        /**
         * @property \PikseraPackages\Content\DataFieldsManager    $data_fields_manager
         */
        $this->app->singleton('data_fields_manager', function ($app) {
            return new DataFieldsManager();
        });

        /**
         * @property \PikseraPackages\Content\AttributesManager    $attributes_manager
         */
        $this->app->singleton('attributes_manager', function ($app) {
            return new AttributesManager();
        });


        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }
}
