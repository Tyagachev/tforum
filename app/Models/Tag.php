<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'tags';

    /**
     * @var string[]
     */
    protected $fillable = ['name'];

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class);
    }
}
