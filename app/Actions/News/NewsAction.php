<?php
namespace App\Actions\News;

class NewsAction
{
    /**
     * Сохранение файла в
     * app/public/news
     *
     * @param object $request
     * @return string
     */
    public function saveFile(object $request): string
    {
        $path = $request->file('image')->store('news');
        return $path;
    }

    /**
     * Удаление файла
     * картинки новостей
     *
     * @param object $file
     * @return bool
     */
    public function deleteFile(object $file): bool
    {
        $filePath = storage_path('app/public/' . $file->image);
        if(unlink($filePath)) {
            return true;
        }
        return false;
    }
};
