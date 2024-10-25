<?php

namespace App\Services\Interfaces;

interface IProductService
{
    public function getAll();

    public function store($data);

    public function update($product, $data);

    public function destroy($product);
}
