<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{


    /**
     * Роль админа
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
     * Роль модер + админ
     *
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function moder(User $user, User $model): bool
    {
        return $user->role == 1 || $user->role == 2;
    }

}
