<?php

namespace PikseraPackages\Modules\Content\Http\Controllers;

use Illuminate\Http\Request;

class ContentLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-content::live-edit.settings',['moduleId' => $params['id']]);
    }
}
