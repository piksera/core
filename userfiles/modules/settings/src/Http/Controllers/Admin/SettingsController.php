<?php

namespace PikseraPackages\Modules\Settings\Http\Controllers\Admin;

use Illuminate\Http\Request;

class SettingsController
{
    public function index(Request $request)
    {
        return view('piksera-module-settings::admin.index',[

        ]);
    }
}
