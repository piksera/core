<?php

namespace PikseraPackages\Shop\tests;


use PikseraPackages\Shop\Http\Livewire\Admin\DashboardSalesComponent;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class ShopLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        DashboardSalesComponent::class,
    ];
}
