<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class DemandeDevisComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_devis_id',
        'message'
    ];


     public function devis() : BelongsTo
    {
        return $this->belongsTo(DemandeDevis::class, 'demande_devis_id', 'id');
    }

    protected $table = 'demande_devis_complaint';
}
