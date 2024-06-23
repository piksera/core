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

namespace PikseraPackages\Category\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Category\CategoryManager;
use PikseraPackages\Category\Http\Livewire\Admin\CategoryBulkMoveModalComponent;
use PikseraPackages\Category\Http\Livewire\Admin\CategoryManageComponent;
use PikseraPackages\Category\Models\Category;
use PikseraPackages\Category\Models\CategoryItem;
use PikseraPackages\Category\Repositories\CategoryRepository;
use PikseraPackages\Database\Observers\BaseModelObserver;
use Illuminate\Contracts\Support\DeferrableProvider;
use PikseraPackages\Category\TranslateTables\TranslateCategory;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
        $this->app->resolving(\PikseraPackages\Repository\RepositoryManager::class, function (\PikseraPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Category::class, function () {
                return new CategoryRepository();
            });
        });

        /**
         * @property CategoryRepository   $category_repository
         */
        $this->app->bind('category_repository', function ($app) {
            return $this->app->repository_manager->driver(Category::class);;
        });
        parent::register();
    }

        /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');


        $this->app->translate_manager->addTranslateProvider(TranslateCategory::class);

        /**
         * @property \PikseraPackages\Category\CategoryManager    $category_manager
         */
        $this->app->singleton('category_manager', function ($app) {
            return new CategoryManager();
        });

        Category::observe(BaseModelObserver::class);
        CategoryItem::observe(BaseModelObserver::class);

        View::addNamespace('category', dirname(__DIR__) . '/resources/views');

        Livewire::component('admin-category-manage', CategoryManageComponent::class);

    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['category_manager'];
    }

}

