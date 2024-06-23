<?php

namespace PikseraPackages\Modules\Faq\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Faq\Http\Livewire\FaqSettingsComponent;

class FaqServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-faq');
        $package->hasViews('piksera-module-faq');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-faq::settings', FaqSettingsComponent::class);
        ModuleAdmin::registerSettings('faq', 'piksera-module-faq::settings');

    }

}
