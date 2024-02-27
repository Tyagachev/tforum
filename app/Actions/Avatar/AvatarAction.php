<?php

namespace App\Actions\Avatar;

class AvatarAction
{
    /**
     * Сохранение файла аватара
     * на диск
     *
     * @param object $request
     * @return string
     */
    public function saveFile(object $request): string
    {
        $path = $request->file('avatar')->store('avatars');
        return $path;
    }

    /**
     * Удаление файла аватарки
     *
     * @param object $avatarObject
     * @return bool
     */
    public function deleteFile(object $avatarObject): bool
    {
        $filePath = storage_path('app/' . $avatarObject->image);
        if(unlink($filePath)) {
            return true;
        }
        return false;
    }
}
