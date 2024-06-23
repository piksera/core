<?php


namespace PikseraPackages\Modules\GoogleMaps\Providers;


use Livewire\Livewire;

use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\GoogleMaps\Http\Livewire\GoogleMapsSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class GoogleMapsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-google-maps');
        $package->hasViews('piksera-module-google-maps');
    }

    public function register(): void
    {

        parent::register();
        Livewire::component('piksera-module-google-maps::settings', GoogleMapsSettingsComponent::class);
        ModuleAdmin::registerSettings('google_maps', 'piksera-module-google-maps::settings');

    }



}
