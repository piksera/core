<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Livewire\Http\Controllers;

use Livewire\Controllers\LivewireJavaScriptAssets as BaseLivewireJavaScriptAssets;
class LivewireJavaScriptAssets  extends BaseLivewireJavaScriptAssets
{
    use CanPretendToBeAFileButNotInCliTrait;


}