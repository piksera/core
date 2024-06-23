<?php

namespace PikseraPackages\Modules\Logo\Providers;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Logo\Http\Livewire\LogoSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class LogoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-logo');
        $package->hasViews('piksera-module-logo');
    }


    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-logo::settings', LogoSettingsComponent::class);
        ModuleAdmin::registerSettings('logo', 'piksera-module-logo::settings');

    }
}
