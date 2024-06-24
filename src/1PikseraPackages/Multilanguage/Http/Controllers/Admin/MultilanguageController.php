<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */
namespace PikseraPackages\Multilanguage\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PikseraPackages\Admin\Http\Controllers\AdminController;
use PikseraPackages\Admin\Http\Controllers\AdminDefaultController;
use PikseraPackages\Post\Http\Requests\PostRequest;
use PikseraPackages\Post\Repositories\PostRepository;

class MultilanguageController extends AdminController
{
    public function index(Request $request) {

        return view('multilanguage::admin.multilanguage.index');
    }

}
