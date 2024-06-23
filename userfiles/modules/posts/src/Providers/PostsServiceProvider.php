<?php

namespace PikseraPackages\Modules\Posts\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Posts\Http\Livewire\PostsSettingsComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PostsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-posts');
        $package->hasViews('piksera-module-posts');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-posts::settings', PostsSettingsComponent::class);
        ModuleAdmin::registerSettings('posts', 'piksera-module-posts::settings');
    }

}
