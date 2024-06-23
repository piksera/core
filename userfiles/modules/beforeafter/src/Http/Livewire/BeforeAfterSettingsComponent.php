<?php
namespace PikseraPackages\Modules\BeforeAfter\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class BeforeAfterSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-beforeafter::livewire.settings');
    }
}
