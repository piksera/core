<?php

namespace PikseraPackages\Modules\CustomFields\Http\Controllers;

use Illuminate\Http\Request;

class CustomFieldsLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-custom-fields::live-edit.settings',['moduleId' => $params['id']]);
    }
}
