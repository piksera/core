<?php

namespace PikseraPackages\Modules\Admin\Modules\TemplatesSettings\Providers;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\TemplateSettings\Http\Livewire\TemplatesSettingsSettingsComponent;

class TemplatesSettingsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-admin-module-templates-settings');
    }

    public function register(): void
    {

        parent::register();

        View::addNamespace('piksera-module-admin-module-templates-settings', normalize_path((dirname(__DIR__)) . '/resources/views'));

    }

}
