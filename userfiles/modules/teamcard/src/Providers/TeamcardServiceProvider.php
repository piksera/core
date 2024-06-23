<?php

namespace PikseraPackages\Modules\Teamcard\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Teamcard\Http\Livewire\TeamcardSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class TeamcardServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-teamcard');
        $package->hasViews('piksera-module-teamcard');
    }


    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-teamcard::settings', TeamcardSettingsComponent::class);
        ModuleAdmin::registerSettings('teamcard', 'piksera-module-teamcard::settings');


    }
}
