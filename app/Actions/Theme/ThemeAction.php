<?php

namespace App\Actions\Theme;

class ThemeAction
{
    /**
     * Сохранение файла картинки сообщества
     *
     * @param object $imageFile
     * @return false
     */
    public function saveImageFile(object $imageFile)
    {
        $path = $imageFile->file('image')->store('themeImg');
        if ($path) {
            return $path;
        }
        return false;
    }

    /**
     * Удаление файла
     * картинки сообщества
     *
     * @param $fileName
     * @return bool
     */
    public function deleteImageFile($fileName)
    {
        $deleteFilePath = storage_path('app/public/' . $fileName->image);
        if (unlink($deleteFilePath)){
            return true;
        }
        return false;
    }
}
