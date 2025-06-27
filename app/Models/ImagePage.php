<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'key',
        'filename',
        'alt'
    ];

    protected $table = 'images_pages';
    public $timestamps = false;
}
