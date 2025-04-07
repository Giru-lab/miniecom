<?php

namespace App\Livewire\admin;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;


class AdminOverview extends Component
{
    public $totalOrders;
    public $totalProducts;
    public $totalCategories;
    public $ordersByStatus;

    public function mount()
    {
        $this->loadOverviewData();
    }

    public function loadOverviewData()
    {
        $this->totalOrders = Order::count();
        $this->totalProducts = Product::count();
        $this->totalCategories = Category::count();
    }
    public function render()
    {
        $orders = Order::where('created_at', '>=', Carbon::now()->subDays(6))->get();

        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('m/d'); // Store the formatted date as label
            
            // Sum the total price of orders created on the specific day
            $totalPrice = $orders->filter(function ($order) use ($date) {
                return Carbon::parse($order->created_at)->isSameDay($date); // Check if the order's date matches the loop date
            })->sum('total_price'); // Sum the total_price of matching orders
            
            $data[] = $totalPrice; // Store the sum for the chart
        } 
        return view('livewire.admin.overview', compact('labels','data'))->layout('components.layouts.admin');
    }
}
