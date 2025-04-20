<div>
    
    
    <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">All Products</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Stock</th>
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
                    <td>{{ $product->stock }}</td>
                    <td>
                        <form action="{{ route('admin.edit', ['id' => $product->id]) }}"w method="get">
                            <button class="btn btn-warning">Edit</button>
                        </form>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
