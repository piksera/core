<?php

namespace PikseraPackages\Modules\BeforeAfter\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\BeforeAfter\Http\Livewire\BeforeAfterSettingsComponent;

class BeforeAfterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-beforeafter');
        $package->hasViews('piksera-module-beforeafter');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-beforeafter::settings', BeforeAfterSettingsComponent::class);

        ModuleAdmin::registerSettings('beforeafter', 'piksera-module-beforeafter::settings');
    }

}
