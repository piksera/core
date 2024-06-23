<?php

namespace PikseraPackages\Order\Http\Livewire\Admin;

class FilterItemOrdersShippingAddress extends OrdersShippingCountryAutoComplete
{
    public string $placeholder = 'Type to search by address...';
    public $modelGroupByField = 'address';
}
