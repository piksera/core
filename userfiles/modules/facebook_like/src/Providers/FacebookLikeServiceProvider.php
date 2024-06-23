<?php

namespace PikseraPackages\Modules\FacebookLike\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\FacebookLike\Http\Livewire\FacebookLikeSettingsComponent;

class FacebookLikeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-facebook-like');
        $package->hasViews('piksera-module-facebook-like');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-facebook-like::settings', FacebookLikeSettingsComponent::class);
        ModuleAdmin::registerSettings('facebook_like', 'piksera-module-facebook-like::settings');

    }

}
