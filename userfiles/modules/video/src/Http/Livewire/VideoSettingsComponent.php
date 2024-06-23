<?php
namespace PikseraPackages\Modules\Video\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class VideoSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-video::livewire.settings');
    }
}
