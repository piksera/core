<?php

namespace PikseraPackages\Modules\Categories\CategoryImages\Providers;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Categories\CategoryImages\Http\Livewire\CategoryImagesSettingsComponent;

class CategoryImagesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-category-images');
        $package->hasViews('piksera-module-category-images');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-category-images::settings', CategoryImagesSettingsComponent::class);
        ModuleAdmin::registerSettings('categories/category_images', 'piksera-module-category-images::settings');

    }

}
