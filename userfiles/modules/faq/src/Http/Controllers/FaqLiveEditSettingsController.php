<?php

namespace PikseraPackages\Modules\Faq\Http\Controllers;

use Illuminate\Http\Request;

class FaqLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-faq::live-edit.settings',['moduleId' => $params['id']]);
    }
}
