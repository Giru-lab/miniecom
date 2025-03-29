<div>
        <div class="com_card mx-2">
            <h3 class="com_card_title mb-3">Edit Product</h3>

            <form wire:submit.prevent="save">
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
                <input type="file" wire:model="images" id="images" class="form-input" />
                @error('newImage') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                <button type="submit" class="btn-one mt-3">Update Product</button>
            </form>
            <form action="{{ route('admin.products') }}">
                <button type="submit" class="btn btn-secondary mt-3">Cancel</button>
            </form>

            @if (session()->has('message'))
                <div class="alert alert-success mt-2">{{ session('message') }}</div>
            @endif
        </div>
</div>
