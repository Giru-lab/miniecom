<div class="row">
  @foreach ($products as $product)
  <div class="col-lg-4">
      <div class="product_card ">
        <img src="{{ asset('storage/' . $product->image) }}" 
             alt="{{ $product->title }}" 
             class="product_img"
             style="width: 200px; height: 200px; object-fit: cover; display: block; margin: 0 auto; border-radius: 5px;">

        <div class="pc_content">
          <h2>{{ $product->title }}</h2>

          @if (!empty($product->category))
            <p class="pcc_in">In <a href="{{ route('category.show', $product->category->id) }}">{{ $product->category->name }}</a></p>
          @else
            <p class="pcc_in"><em>Uncategorized</em></p>
          @endif

          <p class="pcc_price">${{ $product->price }}</p>

          <div class="pcc_btns">
            <button wire:click="addToCart({{ $product->id }})" class="addtocart">Add To Cart</button>
            <a href="{{ route('product.show', $product->id) }}" class="viewbtn">View Details</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  @if (session()->has('message'))
    <div class="alert alert-success mt-2">{{ session('message') }}</div>
  @endif
</div>
