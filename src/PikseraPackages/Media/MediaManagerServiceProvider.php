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

namespace PikseraPackages\Media;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use PikseraPackages\Media\Models\Media;
use PikseraPackages\Media\Repositories\MediaRepository;

class MediaManagerServiceProvider extends ServiceProvider implements DeferrableProvider
{


    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');


        $this->app->resolving(\PikseraPackages\Repository\RepositoryManager::class, function (\PikseraPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Media::class, function () {
                return new MediaRepository();
            });
        });


        /**
         * @property MediaRepository   $media_repository
         */
        $this->app->bind('media_repository', function () {
            return $this->app->repository_manager->driver(Media::class);;
        });


    }



    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
        /**
         * @property \PikseraPackages\Media\MediaManager    $media_manager
         */
        $this->app->singleton('media_manager', function ($app) {
            return new MediaManager();
        });


        Config::set('filesystems.disks.media', [
            'driver' => 'local',
            'root' => media_uploads_path(),
            'url' => media_uploads_url(),
            'visibility' => 'public',
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['media_manager'];
    }

}
