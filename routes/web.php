<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\admin\CategoryComponent;
use App\Livewire\admin\AddProductComponent;
use App\Livewire\admin\OrderManagementComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\guest\BrowseProductsComponent;
use App\Livewire\guest\SingleProductComponent;
use App\Livewire\guest\CartComponent;
use App\Http\Controllers\CategoryController;
use App\Livewire\admin\AdminOverview;
use App\Http\Controllers\SuperAdminController;
use App\Livewire\admin\ManageProducts;
use App\Livewire\admin\ShowOrders;
use App\Livewire\guest\ShowOrder;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');


Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {

    Route::get('/admin/dashboard', AdminOverview::class)->name('admin.dashboard');

    Route::get('/admin/categories', CategoryComponent::class)->name('admin.categories');

    Route::get('/admin/add-product', AddProductComponent::class)->name('admin.add-product');

    Route::get('/admin/orders', OrderManagementComponent::class)->name('admin.orders');

    Route::get('/orders', ShowOrders::class)->name('orders.index');
    Route::get('/orders/{orderId}', ShowOrder::class)->name('orders.show');
});



Route::get('/admin/products', [ManageProducts::class, '__invoke'])->name('admin.products');





Route::get('/hidden-admin-register', [SuperAdminController::class, 'showRegistrationForm'])
    ->name('superadmin.register.form')
    ->middleware('checkSuperAdmin');

Route::post('/hidden-admin-register', [SuperAdminController::class, 'register'])
    ->name('superadmin.register');



Route::get('/', BrowseProductsComponent::class)->name('products.browse');

Route::get('/product/{id}', SingleProductComponent::class)->name('product.show');

Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category.show');

Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {

    Route::get('/cart', CartComponent::class)->name('cart');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
