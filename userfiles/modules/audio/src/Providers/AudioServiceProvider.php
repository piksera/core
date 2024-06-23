<?php

namespace PikseraPackages\Modules\Audio\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Audio\Http\Livewire\AudioSettingsComponent;

class AudioServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-audio');
        $package->hasViews('piksera-module-audio');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-audio::settings', AudioSettingsComponent::class);

        ModuleAdmin::registerSettings('audio', 'piksera-module-audio::settings');


    }

}
