<?php

namespace PikseraPackages\Modules\Testimonials\Providers;

use Livewire\Livewire;
use PikseraPackages\Module\Facades\ModuleAdmin;
use PikseraPackages\Modules\Testimonials\Http\Livewire\TestimonialsProjectsDropdownComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PikseraPackages\Modules\Testimonials\Http\Livewire\TestimonialsSettingsComponent;

class TestimonialsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-testimonials');
        $package->hasViews('piksera-module-testimonials');
    }

    public function register(): void
    {
        parent::register();
        Livewire::component('piksera-module-testimonials::settings', TestimonialsSettingsComponent::class);
        Livewire::component('piksera-module-testimonials::projects-dropdown', TestimonialsProjectsDropdownComponent::class);

        ModuleAdmin::registerSettings('testimonials', 'piksera-module-testimonials::settings');

    }

}
