<?php
namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageProducts extends Component
{
    use WithFileUploads;

    public $products, $categories, $title, $description, $price, $image, $category_id, $product_id;
    public $isEditing = false;

    public function mount()
    {
        $this->products = Product::all();
        $this->categories = Category::all();
    }

    public function saveProduct()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        Product::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
            'category_id' => $this->category_id,
        ]);

        $this->resetForm();
        session()->flash('message', 'Product added successfully!');
        $this->products = Product::all();
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->isEditing = true;
    }

    public function updateProduct()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product = Product::findOrFail($this->product_id);
        $imagePath = $product->image;

        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        }

        $product->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
            'category_id' => $this->category_id,
        ]);

        $this->resetForm();
        session()->flash('message', 'Product updated successfully!');
        $this->products = Product::all();
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('message', 'Product deleted successfully!');
        $this->products = Product::all();
    }

    private function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->image = null;
        $this->category_id = null;
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.manage-products', [
            'products' => $this->products,
            'categories' => $this->categories,
        ])->layout('components.layouts.admin');
    }

    public function cancelEdit()
{
    $this->resetForm(); // Reset form fields
    $this->isEditing = false; // Hide the edit form
}

}
