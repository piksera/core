<?php

namespace PikseraPackages\Modules\UnlockPackage\Providers;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\UnlockPackage\Http\Livewire\UnlockPackageSettingsComponent;

class UnlockPackageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-unlock-package');
        $package->hasViews('piksera-module-unlock-package');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-unlock-package::settings', UnlockPackageSettingsComponent::class);
        ModuleAdmin::registerSettings('unlock-package', 'piksera-module-unlock-package::settings');

    }

}
