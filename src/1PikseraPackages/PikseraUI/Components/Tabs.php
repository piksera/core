<?php

namespace PikseraPackages\PikseraUI\Components;

use Illuminate\View\Component;


class Tabs extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('mw-ui.components.tabs');
    }
}
