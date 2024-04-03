<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteRule extends Model
{
    use HasFactory;

    protected $table ='site_rules';
    protected $guarded = false;
    protected $fillable = [
        'paragraph',
        'rule'
    ];
}
