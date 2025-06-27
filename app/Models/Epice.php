<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\EpiceScope;

class Epice extends Product
{
   protected static function booted(): void
   {
        static::addGlobalScope(new EpiceScope);
   }
}
