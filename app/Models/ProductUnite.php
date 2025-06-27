<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductUnite extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'unite_id'
    ];

    protected $table = 'products_unite';
    public $timestamps = false;

    public function unite() : BelongsTo
    {
        return $this->belongsTo(Unite::class, 'unite_id', 'id');
    }
}
