<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommandeComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'message'
    ];


     public function commande() : BelongsTo
    {
        return $this->belongsTo(Commande::class, 'commande_id', 'id');
    }

    protected $table = 'commande_complaint';
}
