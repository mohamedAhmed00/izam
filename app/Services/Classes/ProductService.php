<?php

namespace App\Services\Classes;

use App\Filters\Name;
use App\Filters\Price;
use App\Models\Product;
use App\Services\Interfaces\IProductService;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Cache;

class ProductService implements IProductService
{
    private const CACHE_TIME = 120;
    public function getAll()
    {
        $products = Cache::remember('product_' .implode('-',request()->all()), self::CACHE_TIME, function () {
            return app(Pipeline::class)
                ->send(Product::query())
                ->through([
                    Name::class,
                    Price::class
                ])
                ->thenReturn()->paginate();
        });
        return $products;
    }

    public function store($data)
    {
        return Product::query()->create($data);
    }

    public function update($product, $data)
    {
        $product->update($data);
        return $product;
    }

    public function destroy($product)
    {
        $product->delete();
        return response()->json(['data' => ['message' => __('Product deleted successfully')]]);    }
}
