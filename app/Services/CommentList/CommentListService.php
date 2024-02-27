<?php

namespace App\Services\CommentList;

use App\Models\CommentList;

class CommentListService
{
    public function save($word): void
    {
        $saveWord = new CommentList([
            'word' => $word['word']
        ]);
        $saveWord->save();
    }
}
