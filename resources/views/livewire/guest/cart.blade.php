<div>
    <div class="row">
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 z-50">
                <div class="bg-white rounded-lg shadow-2xl w-96 text-center transform transition-all duration-500 hover:scale-105">
                    <h2 class="text-3xl font-semibold text-gradient mb-4 pt-5">Order Confirmed!</h2>
                    <p class="text-lg text-gray-600 mb-6">{{ session('message') }}</p>
                    <button @click="show=false" class="btn btn-primary mb-5" style="font-size: 1.5rem">
                        Accept and Back
                    </button>
                </div>
            </div>
        @endif
    </div>
    
    <style>
        /* Gradient text effect */
        .text-gradient {
            background: linear-gradient(45deg, #6EE7B7, #3B82F6);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
    
        /* Shadow on the modal */
        .shadow-2xl {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    
        /* Smooth scaling effect on hover */
        .transform {
            transform: scale(1);
        }
    
        .transform:hover {
            transform: scale(1.05);
        }
    </style>
    
    
    

        @if (session()->has('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        @if (session()->has('alert'))
            <p class="text-info">{{ session('alert') }} <a class="text-decoration-underline text-success" href="{{route('profile.edit')}}">Here</a></p>
        @endif

        @if (empty($cart))
        <p class="h4-style">Your cart is empty.</p>

        <style>
          .h4-style {
            font-size: 1.5rem; /* Size of h4 */
            font-weight: bold; /* h4 typically has a bold weight */
          }
        </style>
        
        @else
            <div class="col-12">
                <div class="product_card p-3" style="border-radius: 10px; box-shadow: 10px -2px 20px rgba(0, 0, 0, 0.1);">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $productId => $item)
                                    <tr>
                                        <td>{{ $item['title'] }}</td>
                                        <td>${{ number_format($item['price'], 2) }}</td>
                                        <td>
                                            <input type="number" wire:model.defer="cart.{{ $productId }}.quantity"
                                                   min="1" wire:change="updateQuantity({{ $productId }}, $event.target.value)"
                                                   class="form-control" style="width: 80px;">
                                        </td>
                                        <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                        <td>
                                            <button class="btn btn-danger" onclick="confirmRemove({{ $productId }})" style="font-size: 16px;">Remove</button>
                                        </td>
                                        
                                        
                                        <script>
                                            function confirmRemove(productId) {
                                                // Show a confirmation dialog
                                                const isConfirmed = confirm("Are you sure you want to remove this item from your cart?");
                                                if (isConfirmed) {
                                                    // If confirmed, trigger the removeFromCart method with the product ID
                                                    @this.call('removeFromCart', productId);
                                                }
                                            }
                                        </script>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td></td>
                                    <td></td>
                                    <td>${{ number_format($total, 2) }}</td>
                                    <td><button wire:click="confirmOrder" class="btn btn-primary" style="font-size: 16px;" >Confirm Order</button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- <div class="row mt-4">
        <div class="col-12">
            <div class="product_card p-3" style="border-radius: 30px; box-shadow: 10px -2px 20px rgba(0, 0, 0, 0.1);">
                <h4 class="text-center">Customer Information</h4>
                <form wire:submit.prevent="saveCustomerInfo">
                    <div class="form-group mb-3">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" wire:model.lazy="customer.name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" wire:model.lazy="customer.address" placeholder="Enter your address" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control" wire:model.lazy="customer.contact" placeholder="Enter your contact number" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100 mt-2">Save Information</button>
                </form>
            </div>
        </div>
    </div> --}}
</div>
