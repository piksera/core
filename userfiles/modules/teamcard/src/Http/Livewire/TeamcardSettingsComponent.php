<?php

namespace PikseraPackages\Modules\Teamcard\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class TeamcardSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
        return view('piksera-module-teamcard::livewire.settings');
    }

}
