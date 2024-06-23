<?php

namespace PikseraPackages\Modules\GoogleAnalytics\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use PikseraPackages\Admin\Http\Livewire\AdminComponent;

class AdminGoogleAnalyticsComponent extends AdminComponent
{
    use AuthorizesRequests;

    public function render()
    {
        return view('google_analytics::admin.livewire.index', [

        ]);
    }
}
