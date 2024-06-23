<?php

namespace PikseraPackages\Modules\Newsletter\Providers;

use Livewire\Livewire;
use PikseraPackages\Modules\Newsletter\Console\Commands\ProcessCampaigns;
use PikseraPackages\Modules\Newsletter\Http\Livewire\Admin\NewsletterCampaignsLogModal;
use PikseraPackages\Modules\Newsletter\Http\Livewire\Admin\NewsletterChooseTemplateModal;
use PikseraPackages\Modules\Newsletter\Http\Livewire\Admin\NewsletterDashboardStats;
use PikseraPackages\Modules\Newsletter\Http\Livewire\Admin\NewsletterImportSubscribersModal;
use PikseraPackages\Modules\Newsletter\Http\Livewire\Admin\NewsletterProcessCampaignsModal;
use PikseraPackages\Modules\Newsletter\Http\Livewire\Admin\NewsletterSubscribersList;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NewsletterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('piksera-module-newsletter');
        $package->hasViews('piksera-module-newsletter');
    }

    public function boot(): void
    {
        parent::boot();

        $this->loadViewsFrom((dirname(__DIR__)) . '/resources/views', 'piksera-module-newsletter');

        Livewire::component('admin-newsletter-subscribers-list', NewsletterSubscribersList::class);
        Livewire::component('admin-newsletter-choose-template-modal', NewsletterChooseTemplateModal::class);
        Livewire::component('admin-newsletter-process-campaigns-modal', NewsletterProcessCampaignsModal::class);
        Livewire::component('admin-newsletter-campaigns-log-modal', NewsletterCampaignsLogModal::class);
        Livewire::component('admin-newsletter-import-subscribers-modal', NewsletterImportSubscribersModal::class);
        Livewire::component('admin-newsletter-dashboard-stats', NewsletterDashboardStats::class);
    }

    public function register(): void
    {
        parent::register();

        $this->loadRoutesFrom((dirname(__DIR__)) . '/routes/admin.php');
        $this->loadRoutesFrom((dirname(__DIR__)) . '/routes/web.php');

        if (is_cli()) {
            $this->commands(ProcessCampaigns::class);
        }
    }
}
