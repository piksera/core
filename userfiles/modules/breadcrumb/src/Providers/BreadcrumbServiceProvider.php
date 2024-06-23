<?php

namespace PikseraPackages\Modules\Breadcrumb\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Breadcrumb\Http\Livewire\BreadcrumbSettingsComponent;

class BreadcrumbServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-breadcrumb');
        $package->hasViews('piksera-module-breadcrumb');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-breadcrumb::settings', BreadcrumbSettingsComponent::class);

        ModuleAdmin::registerSettings('breadcrumb', 'piksera-module-breadcrumb::settings');

    }

}
