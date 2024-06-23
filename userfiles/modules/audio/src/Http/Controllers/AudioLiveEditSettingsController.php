<?php

namespace PikseraPackages\Modules\Audio\Http\Controllers;

use Illuminate\Http\Request;

class AudioLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-audio::live-edit.settings',['moduleId' => $params['id']]);
    }
}
