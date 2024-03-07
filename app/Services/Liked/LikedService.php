<?php

namespace App\Services\Liked;

use App\Models\Comment;
use App\Models\Like;

class LikedService
{
    public function save($request)
    {
        $comment = Comment::query()->find($request['likeable_id']);
        $like = new Like([
            'user_id' => $request['user_id'],
            'likeable_id' => $request['likeable_id'],
        ]);
        $comment->likes()->save($like);
        return 'created';
    }
    public function delete($hasLike)
    {
        $hasLike->delete();
        return 'deleted';
    }
}
