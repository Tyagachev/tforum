<?php

namespace App\Models;

use App\Models\Traits\GetDate;
use App\Models\Traits\LikeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    use GetDate;
    use LikeTrait;

    /**
     * Таблица comments
     *
     * @var string
     */
    protected $table = 'comments';

    protected $guarded = false;

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
     * с таблицей комментов,
     * ответы на коммнеты
     *
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany($this, 'parent_id');
    }

    /**
     * Обратная связь с юзером
     * для получения полных данных
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * Обратная связь с топиками
     * для получния данных
     *
     * @return BelongsTo
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class,'topic_id');
    }

    /**
     * Получение имени пользователя
     * для ответов на комменты
     *
     * @param int $reply_user_id
     * @return mixed
     */
    public function getReplyUserName(int $reply_user_id): mixed
    {
        return User::query()->findOrFail($reply_user_id)->name;
    }

    /**
     * Получение данных для комментария
     *
     * @param int $id
     * @return mixed
     */
    public function getCommentData(int $id): mixed
    {
        return $this->findOrFail($id);
    }

    public function isLikeExistComment($commentId)
    {
        return Like::query()
            ->where('user_id', '=', Auth::id())
            ->where('likeable_id', '=', $commentId)
            ->where('likeable_type', '=', 'App\Models\Comment')
            ->first();
    }
}
