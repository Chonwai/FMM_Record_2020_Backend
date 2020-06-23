<?php

namespace App\EloquentFilters\Records;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class CountFilter extends Filter
{
    /**
     * Apply the condition to the query.
     *
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        if ($value === 'all') {
            return $builder->where('id', '<>', NULL);
        } elseif ($value === 'finished') {
            return $builder->where('is_returned', '=', true);
        } elseif ($value === 'not_finishe') {
            return $builder->where('is_returned', '=', false);
        } elseif ($value === null) {
            return $builder->where('id', '<>', NULL); 
        }
    }
}
