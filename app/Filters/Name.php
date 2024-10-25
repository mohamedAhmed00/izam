<?php

namespace App\Filters;

class Name extends AbstractFilter
{
    protected function applyFilter($builder)
    {
        if (request('name')) {
            $builder = $builder->where('name', 'like', '%' . request('name') . '%');
        }
        return $builder;
    }
}
