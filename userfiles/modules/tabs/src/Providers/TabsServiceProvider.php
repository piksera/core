<?php

namespace PikseraPackages\Modules\Tabs\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Tabs\Http\Livewire\TabsSettingsComponent;

class TabsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-tabs');
        $package->hasViews('piksera-module-tabs');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-tabs::settings', TabsSettingsComponent::class);
        ModuleAdmin::registerSettings('tabs', 'piksera-module-tabs::settings');


    }

}
