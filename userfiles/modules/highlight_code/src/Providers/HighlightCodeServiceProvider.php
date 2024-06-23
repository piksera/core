<?php

namespace PikseraPackages\Modules\HighlightCode\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\HighlightCode\Http\Livewire\HighlightCodeSettingsComponent;

class HighlightCodeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-highlight-code');
        $package->hasViews('piksera-module-highlight-code');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-highlight-code::settings', HighlightCodeSettingsComponent::class);

        ModuleAdmin::registerSettings('highlight_code', 'piksera-module-highlight-code::settings');

    }

}
