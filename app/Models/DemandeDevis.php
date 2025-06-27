<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DemandeDevis extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'statut',
        'user_id',
        'ref',
        'commade_id',
        'order_token',
        'price_type' //1 - prix livre 2-prix fob 3-prix usine
    ];

    protected $table = 'demande_devis';

    public function products(): HasMany
    {
        return $this->hasMany(DemandeDevisProduct::class, 'demande_devis_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function response(): BelongsTo
    {
        return $this->belongsTo(DemandeDevisResponse::class, 'id', 'demande_devis_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Commande::class, 'commande_id', 'id');
    }

    
}
