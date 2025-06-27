<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandeDevisProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_devis_id',
        'quantite',
        'product_id',
        'unite_id',
        'unit_price'
    ];



    protected $table = 'demande_devis_products';
    public $timestamps = false;

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function unite() : BelongsTo
    {
        return $this->belongsTo(Unite::class, 'unite_id', 'id');
    }
}
