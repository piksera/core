<?php

namespace PikseraPackages\Shop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PikseraPackages\Admin\Http\Controllers\AdminController;
use PikseraPackages\Admin\Http\Controllers\AdminDefaultController;
use PikseraPackages\Order\Models\Order;
use PikseraPackages\Product\Repositories\ProductRepository;

class DashboardShopController extends AdminController
{
    public function dashboard(Request $request)
    {
        $data = [];
        return view('shop::admin.dashboard', ['data' => $data]);
    }
}
