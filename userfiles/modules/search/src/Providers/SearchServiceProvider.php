<?php

namespace PikseraPackages\Modules\Search\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Search\Http\Livewire\SearchSettingsComponent;

class SearchServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-search');
        $package->hasViews('piksera-module-search');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-search::settings', SearchSettingsComponent::class);
        ModuleAdmin::registerSettings('search', 'piksera-module-search::settings');

    }

}
