<?php

namespace PikseraPackages\FormBuilder\Elements;

class File extends Input
{
    protected $attributes = [
        'type' => 'file',
    ];

    public function getType()
    {
        return 'file';
    }
}
