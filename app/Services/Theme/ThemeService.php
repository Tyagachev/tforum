<?php

namespace App\Services\Theme;

use App\Models\Theme;
use App\Models\Topic;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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

    /**
     * Поиск темы по id
     *
     * @param $id
     * @return object|null
     */
    public function searchTheme($id): object|null
    {
        DB::table('tag_theme')->where('theme_id', '=', $id)->delete();

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

    /**
     * Вывод всех топиков с пагинацией
     *
     * @param object $theme
     * @return LengthAwarePaginator
     */
    public function queryTopicPagination(object $theme): LengthAwarePaginator
    {
        return Topic::query()
            ->join('users', 'users.id', '=', 'topics.user_id')
            ->select('topics.*','users.name as user_name')
            ->where('theme_id', '=', $theme->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(30);
    }
}
