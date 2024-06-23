<?php

namespace PikseraPackages\FormBuilder\Elements;

class Range extends Input
{
    public function getType()
    {
        return 'range';
    }

    protected $attributes = [
        'type' => 'range',
        'class' => 'form-control'
    ];


}
