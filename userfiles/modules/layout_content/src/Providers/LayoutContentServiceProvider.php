<?php

namespace PikseraPackages\Modules\LayoutContent\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\LayoutContent\Http\Livewire\LayoutContentDefaultSettingsTemplateComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\LayoutContent\Http\Livewire\LayoutContentSettingsComponent;

class LayoutContentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-layout-content');
        $package->hasViews('piksera-module-layout-content');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-layout-content::settings', LayoutContentSettingsComponent::class);
        Livewire::component('piksera-module-layout-content::template-settings-default', LayoutContentDefaultSettingsTemplateComponent::class);

        ModuleAdmin::registerSettings('layout_content', 'piksera-module-layout-content::settings');
        ModuleAdmin::registerSkinSettings('layout_content', 'default', 'piksera-module-layout-content::template-settings-default');

    }

}
