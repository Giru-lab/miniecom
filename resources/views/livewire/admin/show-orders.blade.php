<div>
    <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">All Orders</h3>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Tracking</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>
                            <a href="#" class="text-primary" wire:click="showOrder({{ $order->id }})">
                                {{ $order->id }}
                            </a>
                        </td>
                        <td>
                            <a href="#" class="text-primary" wire:click="showOrder({{ $order->id }})">
                                {{ $order->tracking_id }}
                            </a>
                        </td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="approveOrder({{ $order->id }})">Approve</button>
                            <button class="btn btn-danger" wire:click="cancelOrder({{ $order->id }})">Cancel</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Order Details Modal --}}
    @if($selectedOrder)
    <div class="order-details">
        <h4>Order Details</h4>
        <p><strong>Order ID:</strong> {{ $selectedOrder->id }}</p>
        <p><strong>Tracking ID:</strong> {{ $selectedOrder->tracking_id }}</p>
        <p><strong>Customer:</strong> {{ $selectedOrder->user->name }}</p>
        <p><strong>Status:</strong> {{ $selectedOrder->status }}</p>
        <button wire:click="closeOrder" class="btn btn-secondary">Close</button>
    </div>
    @endif
</div>
