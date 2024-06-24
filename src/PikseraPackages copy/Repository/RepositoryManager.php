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

namespace PikseraPackages\Repository;


use Illuminate\Support\Manager;
use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Core\Repositories\BaseRepositoryInterface;
use PikseraPackages\Repository\Repositories\AbstractRepository;


/**
 * @mixin AbstractRepository
 */
class RepositoryManager extends Manager
{


    /**
     * Get a driver instance.
     *
     * @param  string|null  $driver
     * @return AbstractRepository
     *
     * @throws \InvalidArgumentException
     */
    public function driver($driver = null)
    {
        return parent::driver($driver);
    }


    /**
     * Get default driver instance.
     *
     * @throws \InvalidArgumentException
     */
    public function getDefaultDriver()
    {
         return;
    }





}
