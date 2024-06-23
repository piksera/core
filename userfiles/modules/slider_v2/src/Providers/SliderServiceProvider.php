<?php

namespace PikseraPackages\Modules\SliderV2\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\SliderV2\Http\Livewire\SliderSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SliderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-slider-v2');
        $package->hasViews('piksera-module-slider-v2');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-slider-v2::settings', SliderSettingsComponent::class);
        ModuleAdmin::registerSettings('slider_v2', 'piksera-module-slider-v2::settings');

    }

}
