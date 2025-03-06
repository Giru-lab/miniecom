<div>
    <div class="row">
        @if (session()->has('message'))
            <p style="color: green;">{{ session('message') }}</p>
        @endif

        @if (session()->has('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        @if (empty($cart))
            <p>Your cart is empty.</p>
        @else
            <div class="col-12">
                <div class="product_card p-3" style="border-radius: 30px; box-shadow: 10px -2px 20px rgba(0, 0, 0, 0.1);">
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
                                            <button class="btn btn-warning" wire:click="removeFromCart({{ $productId }})">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td></td>
                                    <td></td>
                                    <td>${{ number_format($total, 2) }}</td>
                                    <td><button wire:click="confirmOrder" class="btn btn-primary">Confirm Order</button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="row mt-4">
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
    </div>
</div>
