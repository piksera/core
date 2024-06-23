<?php

namespace PikseraPackages\Modules\Marquee\Providers;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Marquee\Http\Livewire\MarqueeSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class MarqueeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-marquee');
        $package->hasViews('piksera-module-marquee');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-marquee::settings', MarqueeSettingsComponent::class);

        ModuleAdmin::registerSettings('marquee', 'piksera-module-marquee::settings');
    }
}
