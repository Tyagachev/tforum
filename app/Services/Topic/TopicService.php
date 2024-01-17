<?php

namespace App\Services\Topic;

use App\Models\Topic;
use App\Models\User;

class TopicService
{
    /**
     * Сохранение темы в БД
     *
     * @param array $topicData
     * @return bool
     */
    public function save(array $topicData): bool
    {
        $saveData = [
            'user_id' => auth()->user()->id,
            'title' => $topicData['title'],
            'text' => str_replace("\r\n",'<br>', $topicData['text']),
            'tag_topic' => $topicData['tag_topic'],
            'theme_id' => $topicData['theme_id']
        ];
        $topic = new Topic();

        if ($topic->create($saveData)) {
            return true;
        }
        return false;
    }

    /**
     * Обновление темы
     *
     * @param array $topicValidate
     * @return bool
     */
    public function update(array $topicValidate): bool
    {
        $update = [
            'title' => $topicValidate['title'],
            'text' => str_replace("\r\n",'<br>', $topicValidate['text'])
        ];
        $search = Topic::query()->findOrFail($topicValidate['id']);
        if($search->update($update)) {
            return true;
        };
        return false;
    }

    /**
     * Удаление темы
     *
     * @param array $topic
     * @return bool
     */
    public function delete(array $topic): bool
    {
        $search = Topic::query()->findOrFail($topic['id']);
        if ($search->delete()) {
            return true;
        }
        return false;
    }
}
