<?php

namespace App\Repository;

use App\Models\Topic;
use App\Repository\Interfaces\CommentInterface;
use App\Repository\Interfaces\RepositoryInterface;

class CommentRepository implements RepositoryInterface
{

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    /**
     * Получение одного объекта из базы
     *
     * @param int $id
     * @return object|null
     */
    public function getOneObj(int $id): object|null
    {
        $topic = Topic::query()->findOrFail($id);

        return $topic->comments;
    }
}
