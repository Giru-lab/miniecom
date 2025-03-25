<?php

namespace App\Livewire\admin;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $name;
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function saveCategory()
    {
        $this->validate(['name' => 'required|string|max:255']);

        Category::create(['name' => $this->name]);

        $this->name = '';
        $this->categories = Category::all();

        session()->flash('message', 'Category added successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            $this->categories = Category::all();
            session()->flash('message', 'Category deleted successfully!');
        }
    }

    public function render()
    {
        return view('livewire.admin.category', [
            'categories' => $this->categories,
        ])->layout('components.layouts.admin');
    }
}
