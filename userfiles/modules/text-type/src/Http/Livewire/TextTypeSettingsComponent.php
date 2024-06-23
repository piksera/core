<?php

namespace PikseraPackages\Modules\TextType\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class TextTypeSettingsComponent extends ModuleSettingsComponent
{

    public function render()
    {
        return view('piksera-module-text-type::livewire.settings');
    }
}
