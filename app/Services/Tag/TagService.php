<?php

namespace App\Services\Tag;

use App\Models\Tag;
use App\Models\Theme;

class TagService
{
    /**
     * Сохранение id Тега
     * и id Топика в базу
     *
     * @param array $tagName
     * @return bool
     */
    public function save(array $tagName): bool
    {
        $tag = Tag::query()->create([
            'name' => $tagName['name']
        ]);
        $theme = Theme::query()->find($tagName['theme_id']);
        $tag->themes()->attach($theme);
        return true;
    }

    /**
     * Удаление тега
     * и связи тега с топиком
     *
     * @param array $id
     * @return void
     */
    public function delete(array $id): void
    {
        $theme = Theme::query()->find($id['theme_id']);
        $tag = Tag::query()->find($id['tag_id']);
        $tag->delete();
        $tag->themes()->detach($theme);
    }
}
