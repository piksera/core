<?php

namespace PikseraPackages\Modules\TwitterFeed\Http\Controllers;

use Illuminate\Http\Request;

class TwitterFeedLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-twitter-feed::live-edit.settings',['moduleId' => $params['id']]);
    }
}
