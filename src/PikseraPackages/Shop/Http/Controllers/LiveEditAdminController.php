<?php

namespace PikseraPackages\Shop\Http\Controllers;

use Illuminate\Http\Request;

class LiveEditAdminController
{
    public function index(Request $request)
    {
        $moduleId = $request->get('id');

        return view('piksera-module-shop::admin.live_edit', [
            'moduleId'=>$moduleId,
        ]);
    }
}
