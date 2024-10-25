<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
//
        User::factory()->create([
            'name' => 'nader',
            'email' => 'nader@gmail.com',
        ]);

        Product::factory(1000)->create();

        $order = Order::factory()->create();

        $product = Product::first();
        $order->products()->attach([$product->id]);
    }
}
