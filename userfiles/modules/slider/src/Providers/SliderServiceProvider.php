<?php

namespace PikseraPackages\Modules\Slider\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Slider\Http\Livewire\SliderSettingsComponent;

class SliderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-slider');
        $package->hasViews('piksera-module-slider');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-slider::settings', SliderSettingsComponent::class);
        ModuleAdmin::registerSettings('slider', 'piksera-module-slider::settings');

    }

}
