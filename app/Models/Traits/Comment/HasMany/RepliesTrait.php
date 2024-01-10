<?php

namespace App\Models\Traits\Comment\HasMany;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RepliesTrait
{

    /**
     * Связь один ко многим
     * с таблицей комментов
     *
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
