<?php

namespace PikseraPackages\Page\tests;


use PikseraPackages\Page\Http\Livewire\Admin\PagesList;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class PageLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        PagesList::class,
    ];
}
