<?php

namespace App\Livewire\admin;
use App\Models\Order;

use Livewire\Component;

class ShowListOrder extends Component
{

    public $orderId;
    public $productOrders;
    public $orderTotal;
    public $orderss;
    public function mount($id){
        $this->orderId = $id;

        $this->loadOrders($id);
    }
    public function loadOrders($id){

        $orders = Order::findOrFail($id); // find specific id yung /orders/{id}
        $this->orderss = $orders;
        $this->orderTotal = $orders->total_price;
        $order_product = $orders->product()->get(); //find products where orders = 9
        $this->productOrders = $order_product; // display
    }
    public function render()
    {
        return view('livewire.admin.show-list-order')->layout('components.layouts.admin');
    }
}
