<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */
namespace PikseraPackages\Content\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PikseraPackages\Admin\Http\Controllers\AdminController;
use PikseraPackages\Content\Repositories\ContentRepository;

class ContentFormBuilderController extends AdminController
{
    public $repository;

    public function __construct(ContentRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    public function index(Request $request) {
        return view('content::admin.content.form-builder');
    }

}
