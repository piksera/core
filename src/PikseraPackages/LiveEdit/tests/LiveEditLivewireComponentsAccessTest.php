<?php

namespace PikseraPackages\LiveEdit\tests;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;
use PikseraPackages\LiveEdit\Http\Livewire\ModuleTemplateSelectComponent;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class LiveEditLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        ModuleSettingsComponent::class,
        ModuleTemplateSelectComponent::class,
    ];
}

