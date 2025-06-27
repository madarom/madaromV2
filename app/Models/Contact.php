<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'ville',
        'pays',
        'telephone',
        'full_number',
        'prenom',
        'adresse',
        'reseau_sociaux',
        'message',
        'lang'
    ];
}
