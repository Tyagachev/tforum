<?php

namespace App\Models;

use App\Models\Traits\GetDate;
use App\Models\Traits\LikeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;
    use GetDate;
    use LikeTrait;

    /**
     * Таблица topics
     *
     * @var string
     */
    protected $table = 'topics';

    protected $guarded = false;

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

    /**
     * Связь один ко многим
     * с таблицей комментов
     * whereNull('parent_id') - фильтрует по столбцу 'parent_id'
     * который равен null
     *
     * @return HasMany
     */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class, 'topic_id')
            ->where('parent_id', null)->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
