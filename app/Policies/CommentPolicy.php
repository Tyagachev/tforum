<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    public function deleteComment (User $user, Comment $comment)
    {
        return $user->id == $comment->user_id || $user->role == 1;
    }
}
