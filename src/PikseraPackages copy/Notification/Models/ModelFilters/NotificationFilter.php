<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace PikseraPackages\Notification\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use PikseraPackages\Notification\Models\ModelFilters\Traits\NotificationTypeTrait;

class NotificationFilter extends ModelFilter
{
    use NotificationTypeTrait;

}