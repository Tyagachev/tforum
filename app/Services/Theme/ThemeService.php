<?php

namespace App\Services\Theme;

use App\Models\Theme;

class ThemeService
{
    /**
     * Запись сообщества в базу
     *
     * @param array $data
     * @return bool
     */
    public function saveTheme(array $data, string $saveImage)
    {

        $themeField = [
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'image' => $saveImage
        ];

        $themeObj = new Theme();

        $themeObj->create($themeField);
        if ($themeObj) {
            return true;
        }
        return false;
    }

    /**
     * Обновление сообщества
     *
     * @param array $themeValidate
     * @return bool
     */
    public function updateTheme(array $themeValidate): bool
    {
        $updateTheme = [
            'title' => $themeValidate['title'],
            'subtitle' => $themeValidate['subtitle']
        ];

        $searchTheme = Theme::query()->findOrFail($themeValidate['id']);
        if($searchTheme->update($updateTheme)) {
            return true;
        };
        return false;
    }

    public function searchTheme($id)
    {
        $searchTheme = Theme::query()->findOrFail($id);
        return $searchTheme;
    }
    /**
     * Удаление сообщества
     *
     * @param $themeId
     * @return bool
     */
    public function destroyTheme($themeId): bool
    {
        $searchTheme = Theme::query()->findOrFail($themeId);
        if ($searchTheme->delete()) {
            return true;
        }
        return false;
    }
}
