<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_show_order(): void
    {
        $orderId = Order::first()->id;
        $user = User::first();
        $response = $this->get('api/orders/' . $orderId, ['Authorization' => 'Bearer ' . $user->createToken('test')->plainTextToken]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                "customer_name", "customer_phone", "price", "customer_email"
            ],
        ]);
    }

    public function test_see_404_if_order_not_exist(): void
    {
        $user = User::first();

        $response = $this->get('api/orders/' . 100, ['Authorization' => 'Bearer ' . $user->createToken('test')->plainTextToken]);

        $response->assertStatus(404);
    }

    public function test_place_order(): void
    {
        Mail::fake();
        Event::fake();
        $order = Order::factory()->raw();
        $order['products'] = [Product::first()->id];
        $user = User::first();
        $response = $this->post('api/orders/', $order, ['Authorization' => 'Bearer ' . $user->createToken('test')->plainTextToken]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                "customer_name", "customer_phone", "price", "customer_email"
            ],
        ]);
    }
}
