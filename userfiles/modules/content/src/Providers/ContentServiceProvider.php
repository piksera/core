<?php

namespace PikseraPackages\Modules\Content\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Content\Http\Livewire\ContentSettingsComponent;

class ContentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-content');
        $package->hasViews('piksera-module-content');
    }

    public function register(): void
    {
        parent::register();
        // not ready yet
        // Livewire::component('piksera-module-content::settings', ContentSettingsComponent::class);

        //  ModuleAdmin::registerSettings('content', 'piksera-module-content::settings');

    }

}
