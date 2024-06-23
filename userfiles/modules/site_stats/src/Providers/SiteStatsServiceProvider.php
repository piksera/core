<?php

namespace PikseraPackages\Modules\SiteStats\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Livewire\Livewire;
use PikseraPackages\Modules\SiteStats\Listeners\UserWasRegisteredListener;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\SiteStats\Http\Livewire\SiteStatsSettingsComponent;

class SiteStatsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-sitestats');
        $package->hasViews('piksera-module-sitestats');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-sitestats::settings', SiteStatsSettingsComponent::class);
        ModuleAdmin::registerSettings('site_stats', 'piksera-module-sitestats::settings');

        // if google or fb pixel is enabled
        $this->app->register(\PikseraPackages\Modules\SiteStats\Providers\UtmTrackingEventsServiceProvider::class);

        $this->app->register(\PikseraPackages\Modules\SiteStats\Providers\SiteStatsEventsLocalTrackingServiceProvider::class);
    }

}
