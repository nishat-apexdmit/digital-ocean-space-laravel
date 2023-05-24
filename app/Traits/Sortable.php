<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Sortable
{

    public function scopeSorted(Builder $query): Builder
    {
        return $query->orderBy('sort');
    }
}
