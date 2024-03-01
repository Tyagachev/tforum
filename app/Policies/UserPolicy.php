<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{


    /**
     * Проверка на роль админа
     *
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function view(User $user, User $model): bool
    {
        return $user->role == 1;
    }

    /**
     * Проверка на роль
     * модер + админ
     *
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function moder(User $user, User $model): bool
    {
        return $user->role == 1 || $user->role == 2;
    }

    public function ViewLoadAvatarButton (User $user, $model): bool
    {
        return $user->id == $model->id;
    }

    public function ViewDeleteProfileButton (User $user, $model): bool
    {
        return $user->id == $model->id;
    }

}
