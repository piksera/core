<?php

namespace PikseraPackages\Modules\ExampleUi\Providers;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\ExampleUi\Http\Livewire\ExampleUiSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class ExampleUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-example-ui');
        $package->hasViews('piksera-module-example-ui');
    }


    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-example-ui::settings', ExampleUiSettingsComponent::class);
        ModuleAdmin::registerSettings('example_ui', 'piksera-module-example-ui::settings');

    }
}
