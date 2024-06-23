<?php

namespace PikseraPackages\Modules\LayoutContent\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class LayoutContentDefaultSettingsTemplateComponent extends ModuleSettingsComponent
{

    public array $settings = [

    ];

    public function render()
    {
        return view('piksera-module-layout-content::livewire.default-layout-settings');
    }


}
