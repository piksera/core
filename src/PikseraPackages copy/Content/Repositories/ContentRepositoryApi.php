<?php

namespace PikseraPackages\Content\Repositories;

use PikseraPackages\Content\Models\Content;
use PikseraPackages\Content\Events\ContentWasDestroyed;
use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Content\Events\ContentIsCreating;
use PikseraPackages\Content\Events\ContentIsUpdating;
use PikseraPackages\Content\Events\ContentWasCreated;
use PikseraPackages\Content\Events\ContentWasDeleted;
use PikseraPackages\Content\Events\ContentWasUpdated;

class ContentRepositoryApi extends BaseRepository
{

    public function __construct(Content $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new ContentIsCreating($data));

        $product = $this->model->create($data);

        event(new ContentWasCreated($product, $data));

        return $product;
    }

    public function update($data, $id)
    {
        $product = $this->model->find($id);

        event($event = new ContentIsUpdating($product, $data));

        $product->update($data);

        event(new ContentWasUpdated($product, $data));

        return $product;
    }


    public function delete($id)
    {
        $content = $this->model->find($id);

        event(new ContentWasDeleted($content));

        return $content->delete();
    }


    public function destroy($ids)
    {
        event(new ContentWasDestroyed($ids));

        return $this->model->destroy($ids);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
