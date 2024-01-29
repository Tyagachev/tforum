<?php

namespace App\Models;

use App\Models\Traits\Comment\HasMany\CommentsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;
    use CommentsTrait;

    /**
     * Таблица topics
     *
     * @var string
     */
    protected $table = 'topics';

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'text',
        'tag_topic',
        'view_count',
        'user_id',
        'theme_id'
    ];
}
