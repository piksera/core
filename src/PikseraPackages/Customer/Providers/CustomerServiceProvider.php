<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Customer\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Content\Http\Livewire\Admin\ContentList;
use PikseraPackages\Customer\Http\Livewire\CustomersListComponent;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::addNamespace('customer', dirname(__DIR__) . '/resources/views');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/admin.php');
        $this->loadMigrationsFrom(dirname(__DIR__) . '/database/');
    }

    public function register()
    {
        Livewire::component('admin-customers-list', CustomersListComponent::class);
    }
}
