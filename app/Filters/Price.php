<?php

namespace App\Filters;

class Price extends AbstractFilter
{
    protected function applyFilter($builder)
    {
        if (request('min_price') && request('max_price')) {
            $builder = $builder->whereBetween('price', [request('min_price'), request('max_price')]);
        }
        return $builder;
    }
}
