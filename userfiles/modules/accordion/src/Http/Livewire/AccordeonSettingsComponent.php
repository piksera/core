<?php

namespace PikseraPackages\Modules\Accordion\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class AccordeonSettingsComponent extends ModuleSettingsComponent
{
    public $listeners = [
   //     'refreshComponent' => '$refresh',
        'mwOptionSave' => 'render',
     ];


    public function render()
    {

        return view('piksera-module-accordion::livewire.settings');
    }

}
