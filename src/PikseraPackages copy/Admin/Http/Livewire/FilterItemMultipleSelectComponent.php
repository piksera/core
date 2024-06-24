<?php

namespace PikseraPackages\Admin\Http\Livewire;

use Illuminate\Support\Facades\DB;
use PikseraPackages\Tag\Model\Tag;
use PikseraPackages\User\Models\User;

class FilterItemMultipleSelectComponent extends AutoCompleteMultipleSelectComponent
{
    public $name = 'Component';
    public $perPage = 10;
    public $total = 0;

    public string $view = 'admin::livewire.filters.filter-item-mulitple-select';

    public function hideFilterItem($id)
    {
        if ($this->id == $id) {
            $this->closeDropdown($id);
            $this->emit('hideFilterItem', $this->selectedItemKey);
            $this->resetProperties();
        }
    }

}
