<?php

namespace App\Services\Topic;

use App\Models\Topic;
use Illuminate\Pagination\LengthAwarePaginator;

class TopicService
{
    /**
     * Сохранение топика в БД
     *
     * @param array $topicData
     * @return bool
     */
    public function save(array $topicData): bool
    {
        $saveData = [
            'user_id' => auth()->user()->id,
            'title' => $topicData['title'],
            'text' => ("\r\n") ? str_replace("\r\n",'<br>', $topicData['text']) : str_replace("\r\n",'<br><br>', $topicData['text']),
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
     * Обновление топика
     *
     * @param array $topicValidate
     * @return bool
     */
    public function update(array $topicValidate): bool
    {
        $update = [
            'title' => $topicValidate['title'],
            'text' => str_replace("\r\n",'<br><br>', $topicValidate['text'])
        ];
        $search = Topic::query()->findOrFail($topicValidate['id']);
        if($search->update($update)) {
            return true;
        };
        return false;
    }

    /**
     * Удаление топика
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

    /**
     * Поиск топиков с пагинацией
     *
     * @param $theme
     * @param $input
     * @return LengthAwarePaginator
     */
    public function querySearchTopicPagination($theme, $input): LengthAwarePaginator
    {
        return Topic::query()->where( 'title','like', '%' . $input['theme_name'] . '%')
            ->join('users', 'users.id', '=', 'topics.user_id')
            ->select('topics.*','users.name as user_name')
            ->where('theme_id','=', $theme->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(30)->withQueryString();
    }
}
