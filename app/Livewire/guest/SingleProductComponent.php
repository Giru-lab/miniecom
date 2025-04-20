<?php

namespace App\Livewire\guest;

use Livewire\Component;
use App\Models\Product;

class SingleProductComponent extends Component
{
    public $product;
    public $quantity = 1;

    /**

     * Mount the component with the selected product.

     */

    public function mount($id)

    {

        $this->product = Product::findOrFail($id);

    }

    public function addToCart($productId)

    {
        
        $product = Product::find($productId);
        if($this->quantity > $product->stock){
            session()->flash('error', "The available stock is only {$product->stock}");
            return;
        }

        if (!$product) {

            session()->flash('error', 'Product not found.');

            return;

        }

        // Retrieve existing cart from session or create a new one

        $cart = session()->get('cart', []);

        
        if (isset($cart[$productId])) {
            
            $cart[$productId]['quantity']++;
            
        } else {

            $cart[$productId] = [

                'title' => $product->title,

                'price' => $product->price,

                'quantity' => $this->quantity,

            ];

        }

        // Save updated cart to session

        session()->put('cart', $cart);

        session()->flash('message', "{$product->title} added to cart.");

    }
    public function setQuantity($value){
        $this->quantity += $value;
    }
    public function render()

    {

        return view('livewire.guest.view-product');

    }
}
