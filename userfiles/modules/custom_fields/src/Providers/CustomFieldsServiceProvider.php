<?php

namespace PikseraPackages\Modules\CustomFields\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\CustomFields\Http\Livewire\CustomFieldsSettingsComponent;

class CustomFieldsServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-custom-fields');
        $package->hasViews('piksera-module-custom-fields');
    }

    public function register(): void
    {
        parent::register();

       // Livewire::component('piksera-module-custom-fields::settings', CustomFieldsSettingsComponent::class);
       // ModuleAdmin::registerSettings('custom_fields', 'piksera-module-custom-fields::settings');

    }

}
