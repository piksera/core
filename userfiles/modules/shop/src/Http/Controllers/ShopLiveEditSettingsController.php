<?php

namespace PikseraPackages\Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;

class ShopLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-shop::live-edit.settings',['moduleId' => $params['id']]);
    }
}
