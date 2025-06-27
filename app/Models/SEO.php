<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_fr',
        'description_fr',
        'keywords_fr',
        'title_en',
        'description_en',
        'keywords_en',
        'url'
    ];

    protected $table = 'seo';
    public $timestamps = false;
}
