<?php
namespace PikseraPackages\Modules\Pdf\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class PdfSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-pdf::livewire.settings');
    }
}
