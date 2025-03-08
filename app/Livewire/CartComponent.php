<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $cart = [];
    public $total = 0;

    public function mount()
    {
        $this->loadCart();
    }

    private function loadCart()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            $this->updateSession();
            $this->dispatch('cartUpdated'); // Livewire v3: Use dispatch instead of emit
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
        if (empty($this->cart)) {
            session()->flash('error', 'Cart is empty. Add products to confirm an order.');
            return;
        }

        $orderTotal = 0;
        foreach ($this->cart as $productId => $item) {
            $productTotal = $item['price'] * $item['quantity'];
            $orderTotal += $productTotal;

            Order::create([
                'product_id' => $productId,
                'user_id' => Auth::id(),
                'quantity' => $item['quantity'],
                'price_per_item' => $item['price'],
                'total_price' => $productTotal,
                'status' => 'pending',
            ]);
        }

        // Clear the cart after confirming the order
        session()->forget('cart');
        $this->cart = [];
        $this->total = 0;

        session()->flash('message', "Order placed successfully! Your total is $orderTotal.");
        $this->dispatch('orderConfirmed');
        $this->dispatch('cartUpdated');
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
        return view('livewire.cart-component', [
            'cart' => $this->cart,
            'total' => $this->total
        ]);
    }
}
