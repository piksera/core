<?php
namespace PikseraPackages\Modules\TweetEmbed\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class TweetEmbedSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-tweet-embed::livewire.settings');
    }
}
