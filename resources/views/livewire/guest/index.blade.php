<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-4 grid">
            <div class="product_card ">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="product_img"
                    style="width: 200px; height: 200px; object-fit: cover; display: block; margin: 0 auto; border-radius: 5px;">

                <div class="pc_content">
                    <h2
                        style="display: -webkit-box;
                      -webkit-line-clamp: 2; /* Change this number for more or fewer lines */
                    -webkit-box-orient: vertical;
                     overflow: hidden;
                      text-overflow: ellipsis;">
                        {{ $product->title }}
                    </h2>


                    @if (!empty($product->category))
                        <p class="pcc_in h4">In <a
                                href="{{ route('category.show', $product->category->id) }}">{{ $product->category->name }}</a>
                        </p>
                    @else
                        <p class="pcc_in"><em>Uncategorized</em></p>
                    @endif

                    <p class="pcc_price">${{ $product->price }}</p>

                    <div class="pcc_btns h4">
                        <a href="{{ route('product.show', $product->id) }}" class="viewbtn w-100 text-center">View
                            Details</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif
</div>
