<?php

namespace PikseraPackages\Page\Http\Livewire\Admin;

use PikseraPackages\Content\Http\Livewire\Admin\ContentList;
use PikseraPackages\Page\Models\Page;

class PagesList extends ContentList
{
    public $model = Page::class;

    public $showColumns = [
        'id' => true,
        'image' => true,
        'title' => true,
        'author' => true
    ];

    public function getDropdownFiltersTaxonomies()
    {
        $dropdownFilters = [];

        return $dropdownFilters;
    }

}
