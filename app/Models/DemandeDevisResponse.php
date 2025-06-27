<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandeDevisResponse extends Model
{
     use HasFactory;

    protected $fillable = [
        'demande_devis_id',
        'admin_message',
        'user_id',
        'price',
        'price_unit_id'
    ];



    protected $table = 'demande_devis_response';

    public function demande_devis() : BelongsTo
    {
        return $this->belongsTo(DemandeDevis::class, 'demande_devis_id', 'id');
    }

    
    public function price_unit(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'price_unit_id', 'id');
    }
}
