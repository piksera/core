<?php

namespace PikseraPackages\ContentDataVariant\Providers;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\ContentData\TranslateTables\TranslateContentData;

class ContentDataVariantServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(dirname(__DIR__) . DS . 'migrations');
    }

}
