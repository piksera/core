<?php

namespace PikseraPackages\Order\tests;


use PikseraPackages\Order\Http\Livewire\Admin\FilterItemOrderCustomer;
use PikseraPackages\Order\Http\Livewire\Admin\FilterItemOrdersShippingAddress;
use PikseraPackages\Order\Http\Livewire\Admin\Modals\OrdersBulkDelete;
use PikseraPackages\Order\Http\Livewire\Admin\Modals\OrdersBulkOrderStatus;
use PikseraPackages\Order\Http\Livewire\Admin\Modals\OrdersBulkPaymentStatus;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersFiltersComponent;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersShippingCityAutoComplete;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersShippingCountryAutoComplete;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersShippingStateAutoComplete;
use PikseraPackages\Order\Http\Livewire\Admin\OrdersTableComponent;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class OrderLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        OrdersTableComponent::class,
        OrdersShippingStateAutoComplete::class,
        OrdersShippingCountryAutoComplete::class,
        OrdersShippingCityAutoComplete::class,
        OrdersFiltersComponent::class,
        FilterItemOrdersShippingAddress::class,
        FilterItemOrderCustomer::class,
        OrdersBulkPaymentStatus::class,
        OrdersBulkOrderStatus::class,
        OrdersBulkDelete::class,
     ];
}
