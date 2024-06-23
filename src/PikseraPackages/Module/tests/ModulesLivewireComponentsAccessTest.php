<?php

namespace PikseraPackages\Module\tests;

use PikseraPackages\Module\Http\Livewire\Admin\AskForModuleUninstallModal;
use PikseraPackages\Module\Http\Livewire\Admin\ListModules;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class ModulesLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        ListModules::class,
        AskForModuleUninstallModal::class,
    ];
}
