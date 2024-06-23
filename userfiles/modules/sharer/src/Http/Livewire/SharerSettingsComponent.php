<?php
namespace PikseraPackages\Modules\Sharer\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class SharerSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-sharer::livewire.settings');
    }
}
