<?php
namespace PikseraPackages\Post\Http\Requests;

use PikseraPackages\Content\Http\Controllers\Requests\ContentSaveRequest;
use PikseraPackages\Post\Models\Post;
use PikseraPackages\Product\Models\Product;

class PostRequest extends ContentSaveRequest
{
    public $model = Post::class;
}
