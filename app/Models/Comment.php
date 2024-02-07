<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

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

    /**
     * Связь один ко многим
     * с таблицей комментов
     *
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->latest();
    }


}
