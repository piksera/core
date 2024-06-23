<?php

namespace PikseraPackages\Modules\Accordion\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Accordion\Http\Livewire\AccordeonSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class AccordionServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-accordion');
        $package->hasViews('piksera-module-accordion');
    }


    public function register(): void
    {
        parent::register();


        Livewire::component('piksera-module-accordion::settings', AccordeonSettingsComponent::class);
        ModuleAdmin::registerSettings('accordion', 'piksera-module-accordion::settings');


    }
}
