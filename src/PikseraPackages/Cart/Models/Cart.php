<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Cart\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Cart\Models\ModelFilters\CartFilter;
use PikseraPackages\Order\Models\Order;
use PikseraPackages\Product\Models\Product;

class Cart extends Model
{
    public $table = 'cart';

    public $fillable = [
        'email',
        'first_name',
        'last_name',
        'country',
        'amount',
        'payment_amount',
        'transaction_id',
        'city',
        'state',
        'zip',
        'address',
        'phone',
        'user_ip',
        'payment_gw'
    ];

    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(CartFilter::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id','order_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'rel_id');
    }
}
