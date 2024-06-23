<?php

namespace PikseraPackages\Modules\Sharer\Http\Controllers;

use Illuminate\Http\Request;

class SharerLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-sharer::live-edit.settings',['moduleId' => $params['id']]);
    }
}
