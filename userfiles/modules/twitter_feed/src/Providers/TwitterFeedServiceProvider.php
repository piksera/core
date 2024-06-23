<?php

namespace PikseraPackages\Modules\TwitterFeed\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\TwitterFeed\Http\Livewire\TwitterFeedSettingsComponent;

class TwitterFeedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-twitter-feed');
        $package->hasViews('piksera-module-twitter-feed');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-twitter-feed::settings', TwitterFeedSettingsComponent::class);
        ModuleAdmin::registerSettings('twitter_feed', 'piksera-module-twitter-feed::settings');

    }

}
