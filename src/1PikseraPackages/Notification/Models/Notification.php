<?php
namespace PikseraPackages\Notification\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Notification\Models\ModelFilters\NotificationFilter;

class Notification extends Model
{
    use Filterable;

    protected $casts = [
        'data' => 'json',
        'id' => 'string'
    ];

    public $cacheTagsToClear = ['repositories'];

    public function modelFilter()
    {
        return $this->provideFilter(NotificationFilter::class);
    }
}
