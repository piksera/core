<?php

namespace PikseraPackages\Post\Repositories;

use PikseraPackages\Core\Repositories\BaseRepository;
use PikseraPackages\Post\Events\PostIsCreating;
use PikseraPackages\Post\Events\PostIsUpdating;
use PikseraPackages\Post\Events\PostWasCreated;
use PikseraPackages\Post\Events\PostWasDeleted;
use PikseraPackages\Post\Events\PostWasUpdated;
use PikseraPackages\Post\Models\Post;

class PostRepository extends BaseRepository
{

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new PostIsCreating($data));

        $post = $this->model->create($data);

        event(new PostWasCreated($post, $data));

        return $post;
    }

    public function update($data, $id)
    {
        $post = $this->model->find($id);

        event($event = new PostIsUpdating($post, $data));

        $post->update($data);

        event(new PostWasUpdated($post, $data));

        return $post;
    }



}
