<?php

namespace App\Services\Avatar;

use App\Models\Avatar;
use App\Models\User;

class AvatarService
{
    /**
     * Загрузка аватара
     * в БД
     * @param $avatarFileLoad
     * @return bool
     */
    public function save(string $avatarFileLoad): bool
    {
        $avatar = new Avatar([
            'user_id' => auth()->user()->id,
            'image' => $avatarFileLoad
        ]);

        $user = User::query()->find(auth()->user()->id);

        if ($user->avatar()->save($avatar)) {
            return true;
        }
        return false;
    }


    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function searchAvatar(int $id): object|null
    {
        $avatar = Avatar::query()->where('user_id', $id)->first();
        return $avatar;
    }

    public function delete($id)
    {
        $user = User::query()->find($id);
        $user->avatar()->delete();
    }
}
