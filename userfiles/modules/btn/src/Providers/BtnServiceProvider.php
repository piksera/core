<?php


namespace PikseraPackages\Modules\Btn\Providers;


use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Btn\Http\Livewire\ButtonSettingsBootstrapTemplateComponent;
use PikseraPackages\Modules\Btn\Http\Livewire\ButtonSettingsComponent;
use PikseraPackages\Modules\Btn\Http\Livewire\ButtonSettingsDefaultTemplateComponent;
use PikseraPackages\Modules\Btn\Http\Livewire\ButtonSettingsDesignFormComponent;
use PikseraPackages\Modules\Btn\Http\Livewire\ButtonSettingsFormComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class BtnServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-btn');
        $package->hasViews('piksera-module-btn');
    }

    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-btn::settings', ButtonSettingsComponent::class);
        Livewire::component('piksera-module-btn::template-settings-bootstrap', ButtonSettingsBootstrapTemplateComponent::class);
        Livewire::component('piksera-module-btn::template-settings-default', ButtonSettingsDefaultTemplateComponent::class);

        ModuleAdmin::registerSettings('btn', 'piksera-module-btn::settings');
        ModuleAdmin::registerSkinSettings('btn', 'default', 'piksera-module-btn::template-settings-default');
        ModuleAdmin::registerSkinSettings('btn', 'bootstrap', 'piksera-module-btn::template-settings-bootstrap');

    }

}
