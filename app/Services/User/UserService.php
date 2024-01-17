<?php

namespace App\Services\User;

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
    public function save($userData): void
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
     *
     * @param int $id
     * @return void
     */
    public function delete(string $id): void
    {
        $deleteUser = User::query()->find($id);
        $deleteUser->delete();
    }
}
