<?php

namespace PikseraPackages\Modules\TextType\Providers;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\TextType\Http\Livewire\TextTypeSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class TextTypeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-text-type');
        $package->hasViews('piksera-module-text-type');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-text-type::settings', TextTypeSettingsComponent::class);

        ModuleAdmin::registerSettings('text-type', 'piksera-module-text-type::settings');
    }
}
