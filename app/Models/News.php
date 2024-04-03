<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * Таблица news
     *
     * @var string
     */
    protected $table = 'news';

    protected $guarded = false;

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'view_count',
        'image'
    ];
}
