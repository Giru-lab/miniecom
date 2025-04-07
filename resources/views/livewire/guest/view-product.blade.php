<div>
    <div class="row">
        <div class="col-12">
            <div class="product_card">
                <div class="row">
                    <div class="col-lg-4">
                        @if (!empty($product) && !empty($product->image))
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                class="product_img">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="No Image Available" class="product_img">
                        @endif
                    </div>

                    <div class="col-lg-8">
                        <div class="pc_content">
                            @if (!empty($product))
                                <h2>{{ $product->title }}</h2>
                                <p class="pcc_in">In
                                    @if (!empty($product->category))
                                        <a
                                            href="{{ route('category.show', $product->category->id) }}">{{ $product->category->name }}</a>
                                    @else
                                        <span>No Category</span>
                                    @endif
                                </p>
                                <p class="pcc_price">${{ $product->price }}</p>
                                <p class="pcc_description">{{ $product->description }}</p>
                                <div class="d-flex flex-column gap-3"  style="width: fit-content">
                                    @include('livewire.guest.modal.view-product-quantity')
    
                                    <div class="pcc_btns">
                                        <button wire:click="addToCart({{ $product->id }})" type="button" class="addtocart">Add To Cart</button>
                                    </div>
                                    

                                </div>

                                @if (session()->has('message'))
                                    <div class="alert alert-success my-2">{{ session('message') }}</div>
                                @endif
                            @else
                                <p class="text-danger">Product not found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
