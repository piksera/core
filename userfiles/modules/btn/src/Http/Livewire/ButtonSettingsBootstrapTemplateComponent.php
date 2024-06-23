<?php

namespace PikseraPackages\Modules\Btn\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class ButtonSettingsBootstrapTemplateComponent extends ModuleSettingsComponent
{

    public array $settings = [

        'button_style' => '',
        'button_size' => '',
    ];

    public function render()
    {

        return view('piksera-module-btn::livewire.bootstrap-settings');
    }



}
