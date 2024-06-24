<?php
namespace PikseraPackages\Page\Http\Requests;

use PikseraPackages\Content\Http\Controllers\Requests\ContentSaveRequest;
use PikseraPackages\Page\Models\Page;
use PikseraPackages\Post\Models\Post;

class PageRequest extends ContentSaveRequest
{
    public $model = Page::class;
}
