<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class ShowOrders extends Component
{
    public $orders;
    public $selectedOrder = null;

    public function mount()
    {
        $this->orders = Order::with('user')->get();
    }

    public function showOrder($orderId)
    {
        $this->selectedOrder = Order::with(['items.product', 'user'])->find($orderId);
    }

    public function closeOrder()
    {
        $this->selectedOrder = null;
    }

    public function approveOrder($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->update(['status' => 'Approved']);
            $this->orders = Order::with('user')->get(); // Refresh list
        }
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->update(['status' => 'Cancelled']);
            $this->orders = Order::with('user')->get(); // Refresh list
        }
    }

    public function render()
    {
        return view('livewire.show-orders');
    }
}
