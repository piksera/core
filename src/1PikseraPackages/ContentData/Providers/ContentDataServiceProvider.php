<?php

namespace PikseraPackages\ContentData\Providers;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\ContentData\TranslateTables\TranslateContentData;

class ContentDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // ContentData::observe(CreatedByObserver::class);
        $this->app->translate_manager->addTranslateProvider(TranslateContentData::class);
    }
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');

    }

}
