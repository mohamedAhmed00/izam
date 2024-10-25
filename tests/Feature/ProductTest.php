<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_list_product(): void
    {
        $response = $this->get('api/products');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                "*" => [
                    "name", "description", "price", "quantity"
                ],
            ],
        ]);
    }

    public function test_use_name_filter(): void
    {
        $response = $this->json(
            'GET',
            route('products.index', ['name' => 'Reymundo Gottlieb']),
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                "*" => [
                    "name", "description", "price", "quantity"
                ],
            ],
        ]);
    }

    public function test_use_price_filter(): void
    {
        $response = $this->json(
            'GET',
            route('products.index', ['min_price' => 50, 'max_price' => 100]),
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                "*" => [
                    "name", "description", "price", "quantity"
                ],
            ],
        ]);
    }
}
