<?php

namespace PikseraPackages\Product\Repositories;

use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Product\Events\ProductIsCreating;
use PikseraPackages\Product\Events\ProductIsUpdating;
use PikseraPackages\Product\Events\ProductWasCreated;
use PikseraPackages\Product\Events\ProductWasDeleted;
use PikseraPackages\Product\Events\ProductWasDestroyed;
use PikseraPackages\Product\Events\ProductWasUpdated;
use PikseraPackages\Product\Models\Product;

class ProductRepository extends BaseRepository
{

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function create($data)
    {
        event($event = new ProductIsCreating($data));

        $product = $this->model->create($data);

        event(new ProductWasCreated($product, $data));

        return $product;
    }

    public function update($data, $id)
    {
        $product = $this->model->find($id);

        event($event = new ProductIsUpdating($product, $data));

        $product->update($data);

        event(new ProductWasUpdated($product, $data));

        return $product;
    }


    public function delete($id)
    {
        $product = $this->model->find($id);

        event(new ProductWasDeleted($product));

        return $product->delete();
    }


    public function destroy($ids)
    {
        event(new ProductWasDestroyed($ids));

        return $this->model->destroy($ids);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
