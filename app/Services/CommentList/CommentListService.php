<?php

namespace App\Services\CommentList;

use App\Models\Comment;
use App\Models\WordCheck;
class CommentListService
{
    /**
     * Поиск подозрительных комментариев
     * Сравнение заданных слов из БД
     * за интервал даты
     *
     * @param array $dateTime
     * @return array
     */
    public function searchCommentsToWords(array $dateTime): array
    {
        $commentsList = [];
        $wordsCheckList = WordCheck::all();
        foreach ($wordsCheckList as $word) {
            $commentsList[] = Comment::query()
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->where('text', 'like','%' . $word->word . '%' )
                ->whereBetween('comments.created_at', [$dateTime['today'], $dateTime['tomorrow']])
                ->select('comments.*', 'users.name', 'users.id as uid')
                ->get();
        }
        return $commentsList;
    }
    public function delete()
    {

    }
}
