<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class ShowOrder extends Component
{
    public $order;

    public function mount($orderId)
    {
        $this->order = Order::with('user', 'items')->find($orderId);
    }

    public function render()
    {
        return view('livewire.show-order');
    }
    
    public function showOrder($orderId)
{
    $this->selectedOrder = Order::with([
        'items' => function ($query) {
            $query->whereColumn('created_at', 'updated_at'); // Only items where created_at = updated_at
        },
        'items.product',
        'user'
    ])->find($orderId);
}

}
