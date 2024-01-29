<?php
namespace App\Services\News;
use App\Models\News;

class NewsServices
{
    /**
     * Запись в БД
     *
     * @param array $data
     * @param string $saveFile
     * @return bool
     */
    public function save(array $data, string $saveFile): bool
    {
        $store = [
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'text' => str_replace("\r\n",'<br><br>',  $data['text']),
            'image' => $saveFile
        ];

        if(News::query()->create($store)) {
            return true;
        }
        return false;
    }

    /**
     * Поиск новости
     * для дальнейшей обработки
     *
     * @param array $id
     * @return object
     */
    public function searchNews(array $id): object
    {
        $searchNews = News::query()->find($id)->first();

        return $searchNews;
    }

    /**
     * Обновление новости
     * в БД
     *
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool
    {
        $update = [
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'text' => str_replace("\r\n",'<br>', $data['text'])
        ];

        $search = News::query()->find($data['id']);

        if ($search->update($update)) {
            return true;
        }
        return false;
    }

    /**
     * Удаление новости
     * их БД
     *
     * @param object $searchObj
     * @return void
     */
    public function delete(object $searchObj): void
    {
        $searchObj->delete();
    }
}
