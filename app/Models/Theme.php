<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    /**
     * Таблица themes
     *
     * @var string
     */
    protected $table = 'themes';

    protected $guarded = false;

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'subtitle',
        'image'
    ];

    /**
     * Один ко многим топики
     * с фильтрыцией по дате создания
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(Topic::class,'theme_id')->orderBy('created_at', 'DESC');
    }

    /**
     * Многие ко многим
     * связь с тегами
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
