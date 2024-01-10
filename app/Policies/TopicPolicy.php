<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy
{
    public function editTopic (User $user, Topic $topic)
    {
        return $user->id == $topic->user_id;
    }
}
