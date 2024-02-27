<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordCheck extends Model
{
    use HasFactory;

    protected $table = 'word_checks';

    protected $fillable = [
        'word'
    ];
}
