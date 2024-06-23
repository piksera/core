<?php

namespace PikseraPackages\Modules\Shop\Providers;

use Livewire\Livewire;
use PikseraPackages\Modules\Shop\Http\Livewire\ShopComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Shop\Http\Livewire\ShopSettingsComponent;

class ShopServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-shop');
        $package->hasViews('piksera-module-shop');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-shop::index', ShopComponent::class);
        Livewire::component('piksera-module-shop::shop-settings', ShopSettingsComponent::class);

     //   ModuleAdmin::registerSettings('shop', 'piksera-module-shop::settings');

    }

}
