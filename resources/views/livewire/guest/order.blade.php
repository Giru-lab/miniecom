<div class="com_card mx-2">
    <h3 class="com_card_title mb-3">Order Details</h3>

    @if ($selectedOrder)
        <table class="table">
            <tr>
                <th>Order ID</th>
                <td>{{ $selectedOrder->id }}</td>
            </tr>
            <tr>
                <th>Tracking ID</th>
                <td>{{ $selectedOrder->tracking_id }}</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{ $selectedOrder->user->name }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $selectedOrder->status }}</td>
            </tr>
        </table>

        <h4 class="mt-3">Items</h4>

        @if ($selectedOrder->items && $selectedOrder->items->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($selectedOrder->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'Unknown Product' }}</td>
                            <td>{{ $item->quantity ?? 0 }}</td>
                            <td>${{ number_format($item->price_per_item ?? 0, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No items found for this order.</p>
        @endif

        <button class="btn btn-secondary mt-3" wire:click="closeOrder">Close</button>
    @else
        <p>Select an order to view details.</p>
    @endif
</div>
