<?php

namespace PikseraPackages\Modules\Categories\Providers;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Categories\Http\Livewire\CategorySettingsComponent;

class CategoryServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-category');
        $package->hasViews('piksera-module-category');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-category::settings', CategorySettingsComponent::class);
        //ModuleAdmin::registerSettings('categories', 'piksera-module-category::settings');

    }

}
