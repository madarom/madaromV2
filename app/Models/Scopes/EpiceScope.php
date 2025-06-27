<?php
 
namespace App\Models\Scopes;
 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
 
class EpiceScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     * product_type_id = 2 -> Epice
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('product_type_id', '=', 2);
    }
}