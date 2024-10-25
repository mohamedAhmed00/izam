<?php

namespace App\Filters;

use Closure;

abstract class AbstractFilter
{
    public function handle($data, Closure $next)
    {
        return $next($this->applyFilter($data));
    }

    abstract protected function applyFilter($builder);
}
