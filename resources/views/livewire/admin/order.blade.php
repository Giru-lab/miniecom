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
                          <a href="{{ route('orders.show', $order->id) }}" class="text-primary">
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
                          <a href="{{ route('orders.show', $order->id) }}" class="text-white btn btn-sm btn-success" wire:click="approveOrder({{ $order->id }})">View</a>
                          <button class="btn btn-sm btn-primary" wire:click="approveOrder({{ $order->id }})">Approve</button>
                          <button class="btn btn-sm btn-danger" wire:click="cancelOrder({{ $order->id }})">Cancel</button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>

  {{-- Order Details Modal --}}
  @if($selectedOrder)
  <div class="modal show d-block" style="background: rgba(0,0,0,0.5)">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4>Order Details</h4>
                  <button type="button" class="close" wire:click="closeOrder">&times;</button>
              </div>
              <div class="modal-body">
                  <p><strong>Order ID:</strong> {{ $selectedOrder->id }}</p>
                  <p><strong>Tracking ID:</strong> {{ $selectedOrder->tracking_id }}</p>
                  <p><strong>Customer:</strong> {{ $selectedOrder->user->name }}</p>
                  <p><strong>Status:</strong> {{ $selectedOrder->status }}</p>
                  <p><strong>Product:</strong> {{ $selectedOrder->product->name }}</p>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" wire:click="closeOrder">Close</button>
              </div>
          </div>
      </div>
  </div>
  @endif
</div>
