<?php
namespace PikseraPackages\Modules\TwitterFeed\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class TwitterFeedSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-twitter-feed::livewire.settings');
    }
}
