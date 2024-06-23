<?php

namespace PikseraPackages\Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use PikseraPackages\Page\Models\Page;

class LiveEditAdminController extends \PikseraPackages\Shop\Http\Controllers\LiveEditAdminController
{

    public function index(Request $request)
    {
        $moduleId = $request->get('id');

        $shopIsEnabled = false;
        if (get_option('shop_disabled','website') == 'n') {
            $shopIsEnabled = true;
        }

        if (!$shopIsEnabled) {
            return view('piksera-module-shop::admin.enable_shop');
        }

        return view('piksera-module-shop::admin.live_edit', [
            'moduleId'=>$moduleId,
        ]);
    }
}
