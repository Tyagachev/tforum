<?php

namespace App\Models\Traits\Comment\HasMany;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CommentsTrait
{
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
        return $this->hasMany(Comment::class)->whereNull('parent_id');

    }
}
