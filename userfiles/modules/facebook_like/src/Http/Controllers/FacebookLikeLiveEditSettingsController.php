<?php

namespace PikseraPackages\Modules\FacebookLike\Http\Controllers;

use Illuminate\Http\Request;

class FacebookLikeLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-facebook-like::live-edit.settings',['moduleId' => $params['id']]);
    }
}
