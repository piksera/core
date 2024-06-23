<?php

namespace PikseraPackages\Modules\Slider\Http\Controllers;

use Illuminate\Http\Request;

class SliderLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-slider::live-edit.settings',['moduleId' => $params['id']]);
    }
}
