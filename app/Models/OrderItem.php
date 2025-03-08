<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $products = $request->input('products'); // Ensure this matches your frontend data structure

        DB::transaction(function () use ($products) {
            // Create the order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => collect($products)->sum(fn($item) => $item['quantity'] * $item['price']),
                'status' => 'pending',
            ]);

            // Insert order items
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

        return response()->json(['message' => 'Order placed successfully'], 200);
    }
    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

}



