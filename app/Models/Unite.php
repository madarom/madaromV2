<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_fr',
        'designation_en',
        'abr'
    ];

    protected $table = 'unite';
    public $timestamps = false;
}
