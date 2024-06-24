<?php

namespace PikseraPackages\PikseraUI\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\PikseraUI\Components\Tabs;
use PikseraPackages\PikseraUI\Http\Livewire\CaptchaConfirmModalComponent;
use PikseraPackages\PikseraUI\Http\Livewire\FontPickerModalComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PikseraUIServiceProvider extends PackageServiceProvider
{

     public function configurePackage(Package $package): void
    {
        $package->name('piksera-ui');
        $package->hasViews('piksera-ui');
    }
    public function boot()
    {
        View::prependNamespace('piksera-ui', dirname(__DIR__).'/resources/views');
//        Blade::componentNamespace('PikseraPackages\\View\\Views\\Components', 'mw-ui');
//        Blade::component('tabs', Tabs::class);

        Livewire::component('font-picker-modal', FontPickerModalComponent::class);
        Livewire::component('captcha-confirm-modal', CaptchaConfirmModalComponent::class);

    }
}
