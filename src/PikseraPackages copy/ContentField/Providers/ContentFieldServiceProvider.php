<?php

namespace PikseraPackages\ContentField\Providers;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\ContentField\TranslateTables\TranslateContentField;

class ContentFieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->translate_manager->addTranslateProvider(TranslateContentField::class);
    }
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');

    }

}
