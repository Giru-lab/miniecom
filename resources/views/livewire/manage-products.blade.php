<div>
    <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">{{ $isEditing ? 'Edit Product' : 'Add New Product' }}</h3>

        <form wire:submit.prevent="{{ $isEditing ? 'updateProduct' : 'saveProduct' }}">
            <label for="title" class="form_label">Title</label>
            <input type="text" wire:model="title" class="form-input" />

            <label for="description" class="form_label">Description</label>
            <textarea wire:model="description" class="form-input"></textarea>

            <label for="price" class="form_label">Price</label>
            <input type="number" wire:model="price" class="form-input" />

            <label for="category" class="form_label">Category</label>
            <select wire:model="category_id" class="form-input">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="image" class="form_label">Image</label>
            <input type="file" wire:model="image" class="form-input" />

            <button type="submit" class="btn-one mt-3">
                {{ $isEditing ? 'Update Product' : 'Add Product' }}
            </button>
        </form>

        @if (session()->has('message'))
            <div class="alert alert-success mt-2">{{ session('message') }}</div>
        @endif
    </div>

    <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">All Products</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ optional($product->category)->name }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" style="width: 50px; height: 50px; object-fit: cover;"></td>
                    <td>
                        <button wire:click="editProduct({{ $product->id }})" class="btn btn-warning">Edit</button>
                        <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
