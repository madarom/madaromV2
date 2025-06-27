<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'symbol',
        'iso',
        'dec'
    ];

    protected $table = 'currency';
    public $timestamps = false;
}
