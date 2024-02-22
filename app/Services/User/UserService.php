<?php

namespace App\Services\User;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Сохранение пользователя в базу
     *
     * @param $userData
     * @return void
     */
    public function save(array $userData): void
    {
        $saveData = [
            'name' => $userData['name'],
            'email' => $userData['email'],
            'role' => $userData['role'],
            'password' => Hash::make($userData['password'])
        ];
        $user = new User();
        $user->create($saveData);
    }

    /**
     * Удаление пользователя
     * Удаляет все топики юзера
     * Удаляет аватарку юзера
     * Удаляет все комменты юзера
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $user = User::query()->find($id);

        if (count($user->topics) != 0) {
            $user->topics()->delete();
        }

        if($user->avatar) {
            $user->avatar()->delete();
        }

        if($user->userComment) {
            $user->userComment()->delete();
        }

        $user->delete();
    }
}
