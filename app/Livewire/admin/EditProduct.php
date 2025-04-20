<?php

namespace App\Livewire\Admin;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;
    public $productId, $title, $category_id, $description, $price, $images, $stocks;
    public $updateStock = 1;
    public $current_image;
    public $categories;

    protected $rules = [
        'images.*' => 'required|image|max:2048',
    ];

    public function mount($id)
    {
        $product = Product::findOrFail($id);
        $this->categories = Category::all();

        $this->productId = $product->id;
        $this->title = $product->title;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stocks = $product->stock;
        $this->current_image = $product->image;
    }

    public function save(){

        $this->validate();
        
        
        if($this->images)
            $img = $this->images->store('products', 'public');
        else
            $img = $this->current_image;

        $product = Product::findOrFail($this->productId);

        $product->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $img,
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Product updated successfully!');

    }

    public function updateStocks()
    {
        $this->validate();

        $product = Product::findOrFail($this->productId);

        $product->update([
            'stock' => $this->stocks + $this->updateStock, 
        ]);

        $this->stocks = $product->stock;
        
        session()->flash('stock', 'Stock updated successfully!');
    }

     public function increaseQty()
     {
         $this->updateStock += 1;
     }
 
     public function decreaseQty()
     {
         if ($this->updateStock > 1) {
             $this->updateStock -= 1;
         }
     }


    public function render()
    {
          return view('livewire.admin.edit-product', [
            'categories' => $this->categories,
        ])->layout('components.layouts.admin');

    }
}
