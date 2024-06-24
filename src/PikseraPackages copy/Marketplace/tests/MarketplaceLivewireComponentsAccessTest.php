<?php

namespace PikseraPackages\Marketplace\tests;

use PikseraPackages\Marketplace\Http\Livewire\Admin\Marketplace;
use PikseraPackages\Marketplace\Http\Livewire\Admin\MarketplaceItemModal;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class MarketplaceLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        Marketplace::class,
        MarketplaceItemModal::class,
    ];
}
