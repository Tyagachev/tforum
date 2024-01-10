<?php

namespace App\Repository;

use App\Models\Theme;
use App\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ThemeRepository implements RepositoryInterface
{
    /**
     * Получение списка сообществ
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Theme::all();
    }

    /**
     * Получение одного объекта из базы
     *
     * @param int $id
     * @return object|null
     */
    public function getOneObj(int $id): object|null
    {
        return Theme::query()->findOrFail($id);
    }
}
