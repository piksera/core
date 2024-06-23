<?php
namespace PikseraPackages\Modules\Embed\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class EmbedSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-embed::livewire.settings');
    }
}
