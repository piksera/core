<?php

namespace PikseraPackages\Modules\HighlightCode\Http\Controllers;

use Illuminate\Http\Request;

class HighlightCodeLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-highlight-code::live-edit.settings',['moduleId' => $params['id']]);
    }
}
