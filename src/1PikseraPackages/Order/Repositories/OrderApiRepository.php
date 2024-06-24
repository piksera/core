<?php

namespace PikseraPackages\Order\Repositories;

use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Order\Events\OrderIsCreating;
use PikseraPackages\Order\Events\OrderIsUpdating;
use PikseraPackages\Order\Events\OrderWasCreated;
use PikseraPackages\Order\Events\OrderWasDeleted;
use PikseraPackages\Order\Events\OrderWasDestoyed;
use PikseraPackages\Order\Events\OrderWasUpdated;
use PikseraPackages\Order\Models\Order;

class OrderApiRepository extends BaseRepository
{

    public function __construct(Order $Order)
    {
        $this->model = $Order;
    }

    public function create($data)
    {
        event($event = new OrderIsCreating($data));

        $Order = $this->model->create($data);

        event(new OrderWasCreated($Order, $data));

        return $Order;
    }

    public function update($data, $id)
    {
        $Order = $this->model->find($id);

        event($event = new OrderIsUpdating($Order, $data));

        $Order->update($data);

        event(new OrderWasUpdated($Order, $data));

        return $Order;
    }


    public function delete($id)
    {
        $Order = $this->model->find($id);

        event(new OrderWasDeleted($Order));

        return $Order->delete();
    }


    public function destroy($ids)
    {
        event(new OrderWasDestoyed($ids));

        return $this->model->destroy($ids);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
