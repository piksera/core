<?php

namespace PikseraPackages\Modules\SocialLinks\Providers;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\SocialLinks\Http\Livewire\SocialLinksSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class SocialLinksServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-social-links');
        $package->hasViews('piksera-module-social-links');
    }


    public function register(): void
    {
        parent::register();

        Livewire::component('piksera-module-social-links::settings', SocialLinksSettingsComponent::class);
        ModuleAdmin::registerSettings('social_links', 'piksera-module-social-links::settings');

    }
}
