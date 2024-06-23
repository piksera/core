<?php

namespace PikseraPackages\Post\tests;


use PikseraPackages\Post\Http\Livewire\Admin\PostsList;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class PostLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        PostsList::class,
    ];
}
