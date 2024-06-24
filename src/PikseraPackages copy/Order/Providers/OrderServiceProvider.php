<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Order\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Order\Http\Controllers\OrdersController;
use PikseraPackages\Order\Http\Livewire\Admin\Modals\OrdersBulkDelete;
use PikseraPackages\Order\Http\Livewire\Admin\Modals\OrdersBulkPaymentStatus;
use PikseraPackages\Order\Http\Livewire\Admin\Modals\OrdersBulkOrderStatus;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersCustomersAutoComplete;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersFiltersComponent;
use PikseraPackages\Order\Http\Livewire\Admin\FilterItemOrdersShippingAddress;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersShippingCityAutoComplete;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersShippingCountryAutoComplete;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersShippingStateAutoComplete;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersTableComponent;
use PikseraPackages\Order\Http\Livewire\Admin\FilterItemOrderCustomer;
use PikseraPackages\Order\OrderManager;
use PikseraPackages\Order\Repositories\OrderRepository;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Livewire::component('content-bulk-options', ContentBulkOptions::class);
        Livewire::component('admin-orders-filters', OrdersFiltersComponent::class);
        Livewire::component('admin-orders-table', OrdersTableComponent::class);
        Livewire::component('admin-orders-shipping-country-autocomplete', OrdersShippingCountryAutoComplete::class);
        Livewire::component('admin-orders-shipping-state-autocomplete', OrdersShippingStateAutoComplete::class);
        Livewire::component('admin-orders-shipping-city-autocomplete', OrdersShippingCityAutoComplete::class);
        Livewire::component('admin-orders-shipping-address-autocomplete', FilterItemOrdersShippingAddress::class);
       // Livewire::component('admin-orders-customers-autocomplete', OrdersCustomersAutoComplete::class);
        Livewire::component('admin-orders-bulk-delete', OrdersBulkDelete::class);
        Livewire::component('admin-orders-bulk-order-status', OrdersBulkOrderStatus::class);
        Livewire::component('admin-orders-bulk-payment-status', OrdersBulkPaymentStatus::class);

        Livewire::component('admin-orders-filter-item-customer', FilterItemOrderCustomer::class);

        /**
         * @property \PikseraPackages\Order\OrderManager    $order_manager
         */
        $this->app->singleton('order_manager', function ($app) {
            return new OrderManager();
        });

        /**
         * @property \PikseraPackages\Order\Repositories\OrderRepository    $order_repository
         */
        $this->app->singleton('order_repository', function ($app) {
            return new OrderRepository();
        });



        View::addNamespace('order', dirname(__DIR__) . '/resources/views');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/web.php');
        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/api.php');


    }
}
