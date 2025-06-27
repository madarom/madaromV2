<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'nom',
        'subtitle',
        'summary_desc',
        'detail_desc',
        'pure',
        'stock',
        'home_page',
        'product_type_id', //1 - Huiles essentielles 2- Epices
        'nom_en',
        'subtitle_en',
        'summary_desc_en',
        'detail_desc_en'

    ];

    protected $table = 'products';

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function unites(): HasMany
    {
        return $this->hasMany(ProductUnite::class, 'product_id', 'id');
    }
}
