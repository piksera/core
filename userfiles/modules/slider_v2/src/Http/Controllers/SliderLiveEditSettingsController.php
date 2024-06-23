<?php

namespace PikseraPackages\Modules\SliderV2\Http\Controllers;

use Illuminate\Http\Request;

class SliderLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-slider-v2::live-edit.settings',['moduleId' => $params['id']]);
    }
}
