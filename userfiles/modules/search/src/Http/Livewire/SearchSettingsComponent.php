<?php
namespace PikseraPackages\Modules\Search\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class SearchSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-search::livewire.settings');
    }
}
