<?php

namespace PikseraPackages\Modules\TweetEmbed\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\TweetEmbed\Http\Livewire\TweetEmbedSettingsComponent;

class TweetEmbedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-tweet-embed');
        $package->hasViews('piksera-module-tweet-embed');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-tweet-embed::settings', TweetEmbedSettingsComponent::class);
        ModuleAdmin::registerSettings('tweet_embed', 'piksera-module-tweet-embed::settings');

    }

}
