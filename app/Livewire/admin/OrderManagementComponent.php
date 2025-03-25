<?php

namespace App\Livewire\admin;

use App\Mail\OrderApprovedMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class OrderManagementComponent extends Component
{
    public $selectedOrder = null;

    public function showOrder($orderId)
    {
        $this->selectedOrder = Order::with(['user', 'product'])->find($orderId);
    }

    public function closeOrder()
    {
        $this->selectedOrder = null;
    }

    public function approveOrder($orderId)
    {
        $order = Order::with(['user', 'product'])->find($orderId);

        if ($order) {
            $order->update(['status' => 'approved']);

            // Send the email
            Mail::to($order->user->email)->send(new OrderApprovedMail($order));

            session()->flash('message', "Order #{$order->id} approved successfully, and the user has been notified.");
        } else {
            session()->flash('error', "Order #{$orderId} not found.");
        }
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);

        if ($order) {
            $order->update(['status' => 'cancelled']);
            session()->flash('message', 'Order cancelled successfully!');
        } else {
            session()->flash('error', 'Order not found.');
        }
    }

    public function render()
    {
        return view('livewire.admin.order', [
            'orders' => Order::with('product', 'user')->get()
        ])->layout('components.layouts.admin');
    }
}
