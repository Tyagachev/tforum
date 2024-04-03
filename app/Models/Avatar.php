<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Avatar extends Model
{
    use HasFactory;

    /**
     * Таблица avatars
     *
     * @var string
     */
    protected $table = 'avatars';

    protected $guarded = false;

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'image'
    ];
}
