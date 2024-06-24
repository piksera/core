<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */

namespace PikseraPackages\Content\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PikseraPackages\Admin\Http\Controllers\AdminController;
use PikseraPackages\Admin\Http\Controllers\AdminDefaultController;
use PikseraPackages\Content\Models\Content;
use PikseraPackages\Content\Repositories\ContentRepository;
use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Post\Http\Requests\PostRequest;
use PikseraPackages\Post\Repositories\PostRepository;

abstract class AbstractContentController extends AdminController
{
    public $repository;

    public array $views = [
        'index' => 'content::admin.content.index',
        'create' => 'content::admin.content.edit',
        'edit' => 'content::admin.content.edit',
    ];


    public function __construct($repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    public function index(Request $request)
    {

        return view($this->views['index']);
    }

    public function create(Request $request)
    {
        $request_data = $request->all();

        $data = [];
        $data['content_id'] = 0;
        if (isset($request_data['recommended_category_id'])) {
            $data['recommended_category_id'] = intval($request_data['recommended_category_id']);
        }
        if (isset($request_data['recommended_content_id'])) {
            $data['recommended_content_id'] = intval($request_data['recommended_content_id']);
        }
        return view('product::admin.product.edit', $data);
    }

    public function edit(Request $request, $id)
    {

        return view($this->views['edit'], [
            'content_id' => intval($id)
        ]);
    }
}