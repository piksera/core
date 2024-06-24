<?php

namespace PikseraPackages\Customer\Http\Livewire;

use PikseraPackages\Admin\Http\Livewire\AutoCompleteComponent;
use PikseraPackages\Customer\Models\Customer;

class CustomersAutoCompleteComponent extends AutoCompleteComponent
{
    public $model = Customer::class;
    public $selectedItemKey = 'customerId';
}
