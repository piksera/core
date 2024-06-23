<?php

namespace PikseraPackages\Modules\Sharer\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Sharer\Http\Livewire\SharerSettingsComponent;

class SharerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-sharer');
        $package->hasViews('piksera-module-sharer');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-sharer::settings', SharerSettingsComponent::class);

        ModuleAdmin::registerSettings('sharer', 'piksera-module-sharer::settings');

    }

}
