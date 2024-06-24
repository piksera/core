<?php

namespace PikseraPackages\Menu\Repositories;

use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Menu\Events\MenuIsCreating;
use PikseraPackages\Menu\Events\MenuIsUpdating;
use PikseraPackages\Menu\Events\MenuWasCreated;
use PikseraPackages\Menu\Events\MenuWasDeleted;
use PikseraPackages\Menu\Events\MenuWasUpdated;
use PikseraPackages\Menu\Models\Menu;
use PikseraPackages\Menu\Models\Page;

class MenuApiRepository extends BaseRepository
{
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new MenuIsCreating($data));

        $page = $this->model->create($data);

        event(new MenuWasCreated($page, $data));

        return $page;
    }

    public function update($data, $id)
    {
        $page = $this->model->find($id);

        event($event = new MenuIsUpdating($page, $data));

        $page->update($data);

        event(new MenuWasUpdated($page, $data));

        return $page;
    }

    public function delete($id)
    {
        $page = $this->model->find($id);

        event(new MenuWasDeleted($page));

        return $page->delete();
    }


    public function destroy($ids)
    {
        event(new MenuWasDestroy($ids));

        return $this->model->destroy($ids);
    }
}
