<?php

namespace PikseraPackages\Modules\Video\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Video\Http\Livewire\VideoSettingsComponent;

class VideoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-video');
        $package->hasViews('piksera-module-video');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-video::settings', VideoSettingsComponent::class);
        ModuleAdmin::registerSettings('video', 'piksera-module-video::settings');

    }

}
