<?php

namespace PikseraPackages\Modules\BeforeAfter\Http\Controllers;

use Illuminate\Http\Request;

class BeforeAfterLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-before-after::live-edit.settings',['moduleId' => $params['id']]);
    }
}
