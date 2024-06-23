<?php

namespace PikseraPackages\Content;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Content\Http\Livewire\Admin\ContentBulkOptions;
use PikseraPackages\Content\Http\Livewire\Admin\ContentList;
use PikseraPackages\Content\TranslateTables\TranslateContent;
use PikseraPackages\Content\TranslateTables\TranslateContentFields;
use PikseraPackages\Database\Observers\BaseModelObserver;

/**
 * Class ConfigSaveServiceProvider
 * @package PikseraPackages\Config
 */
class ContentServiceProvider extends ServiceProvider
{
    public function register()
    {
        Livewire::component('admin-content-list', ContentList::class);
        Livewire::component('admin-content-bulk-options', ContentBulkOptions::class);
        View::addNamespace('content', __DIR__ . DS . 'resources' . DS . 'views');

        app()->register(ContentFormBuilderServiceProvider::class);

    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->translate_manager->addTranslateProvider(TranslateContent::class);
        $this->app->translate_manager->addTranslateProvider(TranslateContentFields::class);

        \PikseraPackages\Content\Models\Content::observe(BaseModelObserver::class);
        //  Content::observe(CreatedByObserver::class);


    }
}
