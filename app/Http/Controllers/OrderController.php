<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\Interfaces\IOrderService;

class OrderController extends Controller
{
    public function __construct(private readonly IOrderService $orderService)
    {
    }

    public function store(OrderRequest $request){
        return new OrderResource($this->orderService->create($request->validated()));
    }

    public function show(Order $order){
        return new OrderResource($order);
    }
}
