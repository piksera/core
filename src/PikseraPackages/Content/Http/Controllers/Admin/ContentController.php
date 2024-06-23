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
use PikseraPackages\Post\Http\Requests\PostRequest;
use PikseraPackages\Post\Repositories\PostRepository;

class ContentController extends AdminController
{
    public $repository;

    public function __construct(ContentRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    public function index(Request $request) {

        return view('content::admin.content.index');
    }

    public function create(Request $request) {

        $request_data = $request->all();

        $data = [];
        $data['content_id'] = 0;
        $data['recommended_category_id'] = 0;
        $data['recommended_content_id'] = 0;
        if (isset($request_data['recommended_category_id'])) {
            $data['recommended_category_id'] = intval($request_data['recommended_category_id']);
        }
        if (isset($request_data['recommended_content_id'])) {
            $data['recommended_content_id'] = intval($request_data['recommended_content_id']);
        }

        return view('content::admin.content.edit',$data);
    }

    public function edit(Request $request, $id) {

        return view('content::admin.content.edit', [
            'content_id'=>intval($id)
        ]);
    }
}
