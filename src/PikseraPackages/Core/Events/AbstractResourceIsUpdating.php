<?php

namespace PikseraPackages\Core\Events;

abstract class AbstractResourceIsUpdating
{
    /**
     * @var Model
     */
    private $model;
    private $data;

    public function __construct($model, array $data)
    {
        $this->model = $model;
        $this->data = $data;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return data
     */
    public function getData()
    {
        return $this->data;
    }
}
