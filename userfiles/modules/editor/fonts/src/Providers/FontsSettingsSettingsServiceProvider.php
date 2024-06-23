<?php
namespace PikseraPackages\Modules\Editor\Fonts\FontsSettings\Providers;


use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\TemplateSettings\Http\Livewire\TemplatesSettingsSettingsComponent;

class FontsSettingsSettingsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-editor-fonts');
    }

    public function register(): void
    {

        parent::register();

        View::addNamespace('piksera-module-editor-fonts', normalize_path((dirname(__DIR__)) . '/resources/views'));

    }

}
