<?php

namespace PikseraPackages\Modules\Pdf\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Pdf\Http\Livewire\PdfSettingsComponent;

class PdfServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-pdf');
        $package->hasViews('piksera-module-pdf');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-pdf::settings', PdfSettingsComponent::class);
        ModuleAdmin::registerSettings('pdf', 'piksera-module-pdf::settings');

    }

}
