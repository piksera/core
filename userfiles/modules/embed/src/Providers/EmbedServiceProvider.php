<?php

namespace PikseraPackages\Modules\Embed\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Embed\Http\Livewire\EmbedSettingsComponent;

class EmbedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-embed');
        $package->hasViews('piksera-module-embed');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-embed::settings', EmbedSettingsComponent::class);
        ModuleAdmin::registerSettings('embed', 'piksera-module-embed::settings');

    }

}
