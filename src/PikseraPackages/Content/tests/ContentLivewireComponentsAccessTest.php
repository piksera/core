<?php

namespace PikseraPackages\Content\tests;

use PikseraPackages\Content\Http\Livewire\Admin\ContentBulkOptions;
use PikseraPackages\Content\Http\Livewire\Admin\ContentList;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class ContentLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        ContentBulkOptions::class,
        ContentList::class
    ];
}
