<?php

namespace PikseraPackages\Category\Repositories;

use PikseraPackages\Category\Events\CategoryWasDestroyed;
use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Category\Events\CategoryIsCreating;
use PikseraPackages\Category\Events\CategoryIsUpdating;
use PikseraPackages\Category\Events\CategoryWasCreated;
use PikseraPackages\Category\Events\CategoryWasDeleted;
use PikseraPackages\Category\Events\CategoryWasUpdated;
use PikseraPackages\Category\Models\Category;

class CategoryRepositoryApi extends BaseRepository
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new CategoryIsCreating($data));

        $category = $this->model->create($data);

        event(new CategoryWasCreated($category, $data));

        return $category;
    }

    public function update($data, $id)
    {
        $category = $this->model->find($id);

        if(!$category){
            return;
        }
        event($event = new CategoryIsUpdating($category, $data));

        $category->update($data);

        event(new CategoryWasUpdated($category, $data));

        return $category;
    }

    public function delete($id)
    {
        $category = $this->model->find($id);

        event(new CategoryWasDeleted($category));

        return $category->delete();
    }


    public function destroy($ids)
    {
        event(new CategoryWasDestroyed($ids));

        return $this->model->destroy($ids);
    }

    public function hiddenBulk($ids)
    {
        return $this->model->whereIn('id', $ids)->update(['is_hidden' => 1]);
    }

    public function visibleBulk($ids)
    {
        return $this->model->whereIn('id', $ids)->update(['is_hidden' => 0]);
    }

      public function moveBulk($ids, $moveToParentIds, $moveToRelId)
    {

        if (!empty($ids) && !empty($moveToRelId)) {
            $this->model->whereIn('id', $ids)->update(['rel_id' => $moveToRelId]);
        }

        if (!empty($ids) && !empty($moveToParentIds)) {
            foreach ($moveToParentIds as $moveToParentId) {
                if(in_array($moveToParentId, $ids)){
                    // cannot move to self
                    continue;
                }
                $this->model->whereIn('id', $ids)->update(['parent_id' => $moveToParentId]);
            }
        } else if (!empty($ids) && empty($moveToParentIds)) {
            $this->model->whereIn('id', $ids)->update(['parent_id' => null]);
        }

    }


}
