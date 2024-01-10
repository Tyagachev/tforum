<?php

namespace App\Models;

use App\Models\Traits\Comment\HasMany\RepliesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use RepliesTrait; // трейт с методами ответов на комментарии

    /**
     * Таблица comments
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'reply_user_id',
        'text',
        'topic_id',
        'parent_id'
    ];

}
