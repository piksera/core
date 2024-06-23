<?php

namespace PikseraPackages\Modules\Embed\Http\Controllers;

use Illuminate\Http\Request;

class EmbedLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-embed::live-edit.settings',['moduleId' => $params['id']]);
    }
}
