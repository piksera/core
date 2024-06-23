<?php

namespace PikseraPackages\Modules\Tabs\Http\Controllers;

use Illuminate\Http\Request;

class TabsLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-tabs::live-edit.settings',['moduleId' => $params['id']]);
    }
}
