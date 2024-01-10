<?php

namespace App\Repository;

use App\Models\News;
use App\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class NewsRepository implements RepositoryInterface
{
    /**
     * Получение списка новостей
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return News::query()->orderBy('id', 'DESC')->get();
    }

    /**
     * Получение одного объекта из базы
     *
     * @param int $id
     * @return object|null
     */
    public function getOneObj(int $id): object|null
    {
        return News::query()->findOrFail($id);
    }

}
