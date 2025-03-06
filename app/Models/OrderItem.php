<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

DB::transaction(function () use ($products) {
    // Step 1: Create the order
    $order = Order::create([
        'user_id' => Auth::id(),
        'total_price' => collect($products)->sum(fn($item) => $item['quantity'] * $item['price']),
        'status' => 'pending',
    ]);

    // Step 2: Add each product as an order item
    foreach ($products as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price_per_item' => $item['price'],
            'total_price' => $item['quantity'] * $item['price'],
        ]);
    }
});



