<?php

namespace App\Services\Comment;

use App\Models\Comment;
use App\Models\Topic;

class CommentService
{
    /**
     * Создание комментария
     *
     * @param array $data
     *
     */
    public function save(array $data)
    {
        $topic = Topic::query()->findOrFail($data['topic_id']);
        $comment = new Comment([
            'user_id' => auth()->user()->id,
            'reply_user_id' => $data['reply_user_id'],
            'text' => ("\r\n") ? str_replace("\r\n",'<br>', $data['text']) : str_replace("\r\n",'<br><br>', $data['text']),
            'topic_id' => $data['topic_id'],
            'parent_id' => $data['parent_id']
        ]);
        if ($topic->comments()->save($comment)) {
            return true;
        }
        return false;
    }

    /**
     * Удаление комментария
     *
     * @param array $commentId
     * @return bool
     */
    public function delete(array $commentId): bool
    {
        $comment = Comment::query()->findOrFail($commentId['id']);
       if ($comment->delete()) {
           return true;
       }
       return false;
    }
}
