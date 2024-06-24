<?php

namespace PikseraPackages\MicroweberUI\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\MicroweberUI\Components\Tabs;
use PikseraPackages\MicroweberUI\Http\Livewire\CaptchaConfirmModalComponent;
use PikseraPackages\MicroweberUI\Http\Livewire\FontPickerModalComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MicroweberUIServiceProvider extends PackageServiceProvider
{

     public function configurePackage(Package $package): void
    {
        $package->name('microweber-ui');
        $package->hasViews('microweber-ui');
    }
    public function boot()
    {
        View::prependNamespace('microweber-ui', dirname(__DIR__).'/resources/views');
//        Blade::componentNamespace('PikseraPackages\\View\\Views\\Components', 'mw-ui');
//        Blade::component('tabs', Tabs::class);

        Livewire::component('font-picker-modal', FontPickerModalComponent::class);
        Livewire::component('captcha-confirm-modal', CaptchaConfirmModalComponent::class);

    }
}
