<?php

namespace PikseraPackages\Order\Http\Livewire\Admin\Modals;

use LivewireUI\Modal\ModalComponent;
use PikseraPackages\Admin\Http\Livewire\AdminModalComponent;
use PikseraPackages\Order\Models\Order;

class OrdersBulkDelete extends AdminModalComponent
{
    public $ids = [];

    public function delete()
    {
        Order::whereIn('id', $this->ids)->delete();
        $this->emit('refreshOrdersFilters');
        $this->closeModal();
    }

    public function render()
    {
        return view('order::admin.orders.livewire.bulk-modals.delete');
    }
}
