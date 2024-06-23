<?php

namespace PikseraPackages\Modules\Video\Http\Controllers;

use Illuminate\Http\Request;

class VideoLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-video::live-edit.settings',['moduleId' => $params['id']]);
    }
}
