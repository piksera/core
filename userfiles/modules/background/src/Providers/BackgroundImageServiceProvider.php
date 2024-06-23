<?php

namespace PikseraPackages\Modules\Background\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Accordion\Http\Livewire\AccordeonSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class BackgroundImageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-background');
        $package->hasViews('piksera-module-background');
    }

}
