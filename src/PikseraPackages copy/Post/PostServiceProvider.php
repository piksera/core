<?php

namespace PikseraPackages\Post;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Database\Observers\BaseModelObserver;
use PikseraPackages\Post\Http\Livewire\Admin\PostsList;
use PikseraPackages\Post\Models\Post;
use PikseraPackages\Post\Observers\PostObserver;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('admin-posts-list', PostsList::class);

        Post::observe(BaseModelObserver::class);
        Post::observe(PostObserver::class);

        View::addNamespace('post', __DIR__ . '/resources/views');

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

}
