<?php

namespace PikseraPackages\Modules\Marquee\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class MarqueeSettingsComponent extends ModuleSettingsComponent
{

    public function render()
    {
        return view('piksera-module-marquee::livewire.settings');
    }
}
