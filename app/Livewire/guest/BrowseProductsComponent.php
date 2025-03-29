<?php

namespace App\Livewire\guest;
use App\Models\Product;
use Livewire\Component;

class BrowseProductsComponent extends Component
{
    public function addToCart($productId)

    {

        $product = Product::find($productId);

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
                'id'        => $product->id,
                'title'     => $product->title,
                'price'     => $product->price,
                'quantity'  => 1,

            ];

        }

        // Save updated cart to session

        session()->put('cart', $cart);

        session()->flash('message', "{$product->title} added to cart.");

    }

    

    public function render()

    {

        return view('livewire.guest.index', ['products' => Product::all()]);

    }

    
    
}
