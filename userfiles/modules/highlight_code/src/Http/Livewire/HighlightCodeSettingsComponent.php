<?php
namespace PikseraPackages\Modules\HighlightCode\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class HighlightCodeSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-highlight-code::livewire.settings');
    }
}
