<?php

namespace PikseraPackages\Modules\Layouts\PreviewAll\Providers;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Layouts\PreviewAll\Http\Livewire\LayoutsPreviewAllComponent;

class LayoutsPreviewAllServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-layouts-preview-all');
        $package->hasViews('piksera-module-layouts-preview-all');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-layouts-preview-all', LayoutsPreviewAllComponent::class);
        ModuleAdmin::registerSettings('layouts-preview-all', 'piksera-module-layouts-preview-all::settings');

    }

}
