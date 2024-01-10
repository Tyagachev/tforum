<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserListRepository implements RepositoryInterface
{

    public function getAll(): Collection
    {
        return User::query()->orderBy('id', 'DESC')->get();
    }

    public function getOneObj(int $id): object|null
    {
        return User::query()->findOrFail($id);
    }
}
