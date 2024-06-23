<?php
namespace PikseraPackages\Modules\Slider\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class SliderSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-slider::livewire.settings');
    }
}
