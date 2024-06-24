<?php

namespace PikseraPackages\Shop\Http\Controllers;

use Illuminate\Http\Request;
use PikseraPackages\App\Http\Controllers\ModuleFrontController;
use PikseraPackages\Product\Models\Product;

class ShopController extends ModuleFrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $moduleId = $request->get('id');

        $productQuery = Product::query();

        $productResults = $productQuery->frontendFilter([
            'request'=>$request,
            'moduleId'=>$moduleId
        ]);

        return $this->view('shop::index', [
            'products'=>$productResults,
            'moduleId'=>$moduleId,
        ]);
    }

}
