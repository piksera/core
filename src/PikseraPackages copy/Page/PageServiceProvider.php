<?php

namespace PikseraPackages\Page;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Database\Observers\BaseModelObserver;
use PikseraPackages\Page\Http\Livewire\Admin\PagesList;
use PikseraPackages\Page\Models\Page;
use PikseraPackages\Page\Observers\PageObserver;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('admin-pages-list', PagesList::class);

        Page::observe(BaseModelObserver::class);
        Page::observe(PageObserver::class);

        View::addNamespace('page', __DIR__ . '/resources/views');

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

}
