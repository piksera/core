<?php

namespace PikseraPackages\FormBuilder\Elements;

class Color extends Input
{
    public function getType()
    {
        return 'color';
    }
    protected $attributes = [
        'type' => 'color',
        'class'=>'form-control'
    ];


    public function render() {

        return view('piksera-form-builder::form-inputs.color',[
            'input' => $this,
            'renderAttributes' => $this->renderAttributes(),
        ]);
    }
}
