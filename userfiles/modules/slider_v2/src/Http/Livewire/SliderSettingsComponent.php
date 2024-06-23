<?php
namespace PikseraPackages\Modules\SliderV2\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class SliderSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-slider-v2::livewire.settings');
    }
}
