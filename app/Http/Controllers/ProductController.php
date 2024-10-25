<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Interfaces\IProductService;

class ProductController extends Controller
{
    public function __construct(private readonly IProductService $productService)
    {
    }

    public function index(){
        return ProductResource::collection($this->productService->getAll());
    }

    public function store(ProductRequest $productRequest){
        return new ProductResource($this->productService->store($productRequest->validated()));
    }

    public function show(Product $product){
        return new ProductResource($product);
    }

    public function update(Product $product, ProductRequest $productRequest){
        return new ProductResource($this->productService->update($product, $productRequest->validated()));
    }

    public function destroy(Product $product){
        return $this->productService->destroy($product);
    }
}
