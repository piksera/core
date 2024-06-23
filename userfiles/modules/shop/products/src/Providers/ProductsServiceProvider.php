<?php

namespace PikseraPackages\Modules\Shop\Products\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Shop\Products\Http\Livewire\ProductsSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ProductsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-shop-products');
        $package->hasViews('piksera-module-shop-products');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-shop-products::settings', ProductsSettingsComponent::class);
        ModuleAdmin::registerSettings('shop/products', 'piksera-module-shop-products::settings');
    }

}
