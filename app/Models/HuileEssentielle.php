<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\HuileEssentielleScope;

class HuileEssentielle extends Product
{
    protected static function booted(): void
    {
        static::addGlobalScope(new HuileEssentielleScope);
    }
}
