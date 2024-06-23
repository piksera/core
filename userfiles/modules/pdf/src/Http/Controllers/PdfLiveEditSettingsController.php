<?php

namespace PikseraPackages\Modules\Pdf\Http\Controllers;

use Illuminate\Http\Request;

class PdfLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-pdf::live-edit.settings',['moduleId' => $params['id']]);
    }
}
