<?php

namespace PikseraPackages\Blog\Http\Controllers;

use Illuminate\Http\Request;
use PikseraPackages\App\Http\Controllers\ModuleFrontController;
use PikseraPackages\Content\Models\Content;
use PikseraPackages\Post\Models\Post;

class BlogController extends ModuleFrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $moduleId = $request->get('id');

        $postQuery = Post::query();

        $postResults = $postQuery->frontendFilter([
            'request'=>$request,
            'moduleId'=>$moduleId
        ]);

        return $this->view( 'blog::index', [
            'posts'=>$postResults,
            'moduleId'=>$moduleId
        ]);
    }

}
