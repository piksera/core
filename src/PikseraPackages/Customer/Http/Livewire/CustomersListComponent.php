<?php

namespace PikseraPackages\Customer\Http\Livewire;

use PikseraPackages\Content\Http\Livewire\Admin\ContentList;
use PikseraPackages\Customer\Models\Customer;

class CustomersListComponent extends ContentList
{
    public $model = Customer::class;

    public $noActiveContentView = 'customer::admin.livewire.display-types.no-active-content';

    public $displayTypesViews = [
        'card'=>'customer::admin.livewire.display-types.card',
        'table'=>'customer::admin.livewire.display-types.table',
    ];

    public function getContentTypeProperty()
    {
        return 'Customer';
    }

    public function getCardsStats()
    {
        $count = ($this->getContentsQueryProperty()->count());

        return [
          [
                'name' => 'Customers',
                'value' => $count,
                'icon' => 'mdi mdi-account-multiple',
                'bgClass' => 'bg-primary',
                'textClass' => 'text-white'
          ]
        ];
    }

    public function getDropdownFiltersProperty()
    {
        $dropdownFilters = [];

        $datesFields = $this->getDropdownFiltersDates();
        $dropdownFilters = array_merge($dropdownFilters, $datesFields);

        return $dropdownFilters;
    }
}
