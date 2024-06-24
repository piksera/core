<?php

namespace PikseraPackages\FormBuilder\Elements;

class RangeSlider extends Input
{
    public function getType()
    {
        return 'text';
    }

    public function render() {

        return view('piksera-form-builder::form-inputs.range-slider',[
            'input' => $this,
            'renderAttributes' => $this->renderAttributes(),
        ]);
    }

}
