<?php

namespace PikseraPackages\Product\tests;


use PikseraPackages\Product\Http\Livewire\Admin\ProductsList;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class ProductLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        ProductsList::class,
    ];
}
