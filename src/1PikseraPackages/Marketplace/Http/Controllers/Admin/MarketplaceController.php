<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */
namespace PikseraPackages\Marketplace\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PikseraPackages\Admin\Http\Controllers\AdminController;

class MarketplaceController extends AdminController
{
    public function index(Request $request) {
        return view('marketplace::admin.marketplace.index');
    }
}
