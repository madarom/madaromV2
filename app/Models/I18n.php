<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I18n extends Model
{
    use HasFactory;

     protected $fillable = [
        'key',
        'page',
        'fr',
        'en'
    ];

    protected $table = 'i18n';
    public $timestamps = false;
}
