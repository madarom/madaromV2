<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'demande_devis_id',
        'statut',
        'numero_facture'
    ];

    protected $table = 'commande';

    public function devis(): BelongsTo
    {
        return $this->belongsTo(DemandeDevis::class, 'demande_devis_id', 'id');
    }
}
