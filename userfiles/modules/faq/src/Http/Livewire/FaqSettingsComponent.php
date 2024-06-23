<?php
namespace PikseraPackages\Modules\Faq\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class FaqSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-faq::livewire.settings');
    }
}
