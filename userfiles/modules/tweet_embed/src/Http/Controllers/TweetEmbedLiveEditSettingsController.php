<?php

namespace PikseraPackages\Modules\TweetEmbed\Http\Controllers;

use Illuminate\Http\Request;

class TweetEmbedLiveEditSettingsController
{
    public function index(Request $request)
    {
        $params = $request->all();

        return view('piksera-module-tweet-embed::live-edit.settings',['moduleId' => $params['id']]);
    }
}
