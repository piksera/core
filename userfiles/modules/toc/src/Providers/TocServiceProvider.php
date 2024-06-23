<?php

namespace PikseraPackages\Modules\Toc\Providers;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Toc\Http\Livewire\TocSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class TocServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-toc');
        $package->hasViews('piksera-module-toc');
    }


    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-toc::settings', TocSettingsComponent::class);
        ModuleAdmin::registerSettings('toc', 'piksera-module-toc::settings');

    }
}
