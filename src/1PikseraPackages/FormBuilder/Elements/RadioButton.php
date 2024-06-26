<?php

namespace PikseraPackages\FormBuilder\Elements;

class RadioButton extends Checkbox
{
    protected $attributes = [
        'type' => 'radio',
    ];
    public function getType()
    {
        return 'radio';
    }
    public function __construct($name, $value = null)
    {
        parent::__construct($name);

        if (is_null($value)) {
            $value = $name;
        }

        $this->setValue($value);
    }
}
