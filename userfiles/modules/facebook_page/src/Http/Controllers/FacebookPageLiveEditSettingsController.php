<?php

namespace PikseraPackages\Modules\FacebookPage\Http\Controllers;

use Illuminate\Http\Request;

class FacebookPageLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-facebook-page::live-edit.settings',['moduleId' => $params['id']]);
    }
}
