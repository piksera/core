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

namespace PikseraPackages\Option\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use PikseraPackages\Menu\TranslateTables\TranslateMenu;
use PikseraPackages\Option\TranslateTables\TranslateOption;
use PikseraPackages\Option\Facades\Option as OptionFacade;
use PikseraPackages\Option\GlobalOptions;
use PikseraPackages\Option\Models\Option as OptionModel;
use PikseraPackages\Option\Models\Option;
use PikseraPackages\Option\OptionManager;
use PikseraPackages\Option\Repositories\OptionRepository;


class OptionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(dirname(__DIR__) . '/migrations/');

        $this->app->singleton('option_manager', function ($app) {
            return new OptionManager();
        });

        $this->app->bind('option',function(){
            return new OptionModel();
        });

        $this->app->singleton('global_options', function ($app) {
            return new GlobalOptions(OptionModel::all());
        });


        $this->app->resolving(\PikseraPackages\Repository\RepositoryManager::class, function (\PikseraPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Option::class, function () {
                return new OptionRepository();
            });
        });

        /**
         * @property OptionRepository   $option_repository
         */
        $this->app->bind('option_repository', function () {
            return app()->make(OptionRepository::class);
        });

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->translate_manager->addTranslateProvider(TranslateOption::class);

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('Option', OptionFacade::class);

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/api.php');

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['option_manager', 'option'];
    }
}
