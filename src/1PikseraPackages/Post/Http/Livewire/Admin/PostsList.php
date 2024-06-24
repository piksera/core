<?php

namespace PikseraPackages\Post\Http\Livewire\Admin;

use PikseraPackages\Content\Http\Livewire\Admin\ContentList;
use PikseraPackages\Post\Models\Post;

class PostsList extends ContentList
{
    public $openLinksInModal = false;
    public $model = Post::class;

    public $showColumns = [
        'id' => true,
        'image' => true,
        'title' => true,
        'author' => true
    ];

}
