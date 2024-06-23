<?php

namespace PikseraPackages\Modules\FacebookPage\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\FacebookPage\Http\Livewire\FacebookPageSettingsComponent;

class FacebookPageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-facebook-page');
        $package->hasViews('piksera-module-facebook-page');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-facebook-page::settings', FacebookPageSettingsComponent::class);
        ModuleAdmin::registerSettings('facebook_page', 'piksera-module-facebook-page::settings');

    }

}
