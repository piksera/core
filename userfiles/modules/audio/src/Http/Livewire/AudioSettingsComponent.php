<?php
namespace PikseraPackages\Modules\Audio\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class AudioSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-audio::livewire.settings');
    }
}
