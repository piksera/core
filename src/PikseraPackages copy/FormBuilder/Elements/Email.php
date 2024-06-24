<?php

namespace PikseraPackages\FormBuilder\Elements;

class Email extends Text
{
    protected $attributes = [
        'type' => 'email',
    ];

    public function getType()
    {
        return 'email';
    }
}
