<?php

namespace App\Services\Classes;

use App\Events\EmailNotification;
use App\Models\Order;
use App\Models\Product;
use App\Services\Interfaces\IOrderService;

class OrderService implements IOrderService
{
    public function create($data)
    {
        $products = $data['products'];
        $price = Product::whereIn('id', $data['products'])->sum('price');
        $data['price'] = $price;
        unset($data['products']);
        $order = Order::create($data);
        $order->products()->attach($products);
        EmailNotification::dispatch($order);
        return $order;
    }
}
