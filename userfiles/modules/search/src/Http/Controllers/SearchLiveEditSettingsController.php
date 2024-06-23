<?php

namespace PikseraPackages\Modules\Search\Http\Controllers;

use Illuminate\Http\Request;

class SearchLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-search::live-edit.settings',['moduleId' => $params['id']]);
    }
}
