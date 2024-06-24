<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */
namespace PikseraPackages\Category\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PikseraPackages\Admin\Http\Controllers\AdminController;
use PikseraPackages\Admin\Http\Controllers\AdminDefaultController;
use PikseraPackages\Category\Repositories\CategoryRepository;

class CategoryShopController extends CategoryController
{
    public function create() {

        return view('category::admin.category.edit', [
            'id'=>0,
            'isShop'=>1
        ]);
    }

    public function edit(Request $request, $id) {

        return view('category::admin.category.edit', [
            'id'=>$id,
            'isShop'=>1
        ]);
    }

    public function index(Request $request) {
        return view('category::admin.category.index', ['isShop'=>1]);
    }
}
