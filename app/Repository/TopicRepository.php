<?php

namespace App\Repository;

use App\Models\Topic;
use App\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TopicRepository implements RepositoryInterface
{
    /**
     * Получение списка
     * топиков
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Topic::query()->orderBy('id', 'DESC')->get();
    }

    /**
     * Получение одного объекта из базы
     *
     * @param int $id
     * @return object|null
     */
    public function getOneObj(int $id): object|null
    {
        return Topic::query()->findOrFail($id);
    }
}
