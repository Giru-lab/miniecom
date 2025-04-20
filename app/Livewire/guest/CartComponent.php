<?php

namespace App\Livewire\guest;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartComponent extends Component
{
    public $cart = [];
    public $total = 0;

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            $this->updateSession();
            $this->dispatch('cartUpdated'); 
        }
    }

    public function updateQuantity($productId, $quantity)
    {
        if (isset($this->cart[$productId])) {
            $quantity = max(1, (int) $quantity); // Ensure quantity is a valid positive number
            $this->cart[$productId]['quantity'] = $quantity;
            $this->updateSession();
            $this->dispatch('cartUpdated'); // Livewire v3: Use dispatch instead of emit
        }
    }

    public function confirmOrder()
    {
        $user = auth()->user();
        if ($user->address == NULL){
            session()->flash('alert', 'Please setup first your billing address');
            return;
        }
        
        if (empty($this->cart)) {
            session()->flash('error', 'Cart is empty. Add products to confirm an order.');
            return;
        }

        foreach ($this->cart as $productId => $productData) {
            $product = Product::find($productId);
            
            if (!$product) {
                session()->flash('error', "Product with ID {$productId} not found.");
                return;
            }
    
            if ($product->stock < $productData['quantity']) {
                session()->flash('error', "Not enough stock for {$product->title}. Only {$product->stock} left.");
                return;
            }
        }
        
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $this->total,
            'status' => 'pending',
        ]);
        foreach ($this->cart as $productId => $productData) {
            $product = Product::find($productId);
        
            if ($product) {
                $totalPrice = $productData['price'] * $productData['quantity'];
                
                $order->product()->attach($product, [
                    'quantity' => $productData['quantity'],
                    'total_price' => $totalPrice
                ]);
                
                $product->stock -= $productData['quantity'];
                $product->save();
            }
        }
        
        
        
        


        // Clear the cart after confirming the order
        session()->forget('cart');
        $this->cart = [];
        
        session()->flash('message', "Order placed successfully! Your total is $this->total.");
        $this->dispatch('orderConfirmed');
        $this->dispatch('cartUpdated');
        $this->total = 0;
    }

    private function updateSession()
    {
        session()->put('cart', $this->cart);
        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        $this->total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $this->cart));

    }

    public function render()
    {
        return view('livewire.guest.cart', [
            'cart' => $this->cart,
            'total' => $this->total
        ]);
    }
}
