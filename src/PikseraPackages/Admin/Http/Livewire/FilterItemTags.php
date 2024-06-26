<?php

namespace PikseraPackages\Admin\Http\Livewire;

use Illuminate\Support\Facades\DB;
use PikseraPackages\Tag\Model\Tag;
use PikseraPackages\User\Models\User;

class FilterItemTags extends FilterItemMultipleSelectComponent
{
    public $name = 'Tags';
    public $model = Tag::class;
    public $selectedItemKey = 'tags';
    public string $placeholder = 'Type to search by tags...';

    public $firstItemName;
    public $firstTimeLoading = false;

    protected function getListeners()
    {
        return array_merge($this->listeners, [
            'filterItemTagsRefresh'=>'$refresh',
            'filterItemTagsResetProperties'=>'resetProperties'
        ]);
    }

    public function loadMore()
    {
        $this->emit('loadMoreExecuted');
        $this->perPage = $this->perPage + 5;
        $this->refreshQueryData();
    }

    public function mount()
    {
        $this->firstTimeLoading = true;
        $this->refreshFirstItemName();

        if ($this->showDropdown == 1) {
            $this->refreshQueryData();
        }
    }

    public function updatedSelectedItems(array $items)
    {
        parent::updatedSelectedItems($items);

        $this->refreshFirstItemName();
    }

    public function refreshFirstItemName()
    {
        if (isset($this->selectedItems[0])) {
            $getItem = $this->model::where('slug', $this->selectedItems[0])->first();
            if ($getItem != null) {
                $this->firstItemName = $getItem->name;
            }
        }
    }

    public function refreshQueryData()
    {
        $this->showDropdown($this->id);

        $firstData = [];

        if ($this->firstTimeLoading) {
            if (!empty($this->selectedItems)) {
                $this->selectedItems = array_filter($this->selectedItems);
                $query = $this->model::query();
                $query->whereIn('slug', $this->selectedItems);
                $get = $query->get();
                if ($get != null) {
                    foreach ($get as $item) {
                        $firstData[$item->slug] = ['key' => $item->slug, 'value' => $item->name];
                    }
                }
            }
        }

        $this->firstTimeLoading = false;

        $query = $this->model::query();
        $keyword = trim($this->query);

        if (!empty($keyword)) {
            $query->where('slug', 'like', '%' . $keyword . '%');
            $query->orWhere('name', 'like', '%' . $keyword . '%');
        }

        $this->total = $query->count();

        $query->limit($this->perPage);

        $get = $query->get();
        if ($get != null) {
            $lastData = [];
            foreach ($get as $item) {
                if (isset($firstData[$item->slug])) {
                    continue;
                }
                $lastData[$item->slug] = ['key'=>$item->slug, 'value'=>$item->name];
            }

            $this->data = array_merge($firstData, $lastData);
        }
    }
}
