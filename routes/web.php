<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuperAdminController;
use App\Livewire\admin\CategoryComponent;
use App\Livewire\admin\AddProductComponent;
use App\Livewire\admin\OrderManagementComponent;
use App\Livewire\admin\AdminOverview;
use App\Livewire\admin\ManageProducts;
use App\Livewire\admin\ShowOrders;
use App\Livewire\admin\EditProduct;
use App\Livewire\admin\ShowListOrder;
use App\Livewire\guest\BrowseProductsComponent;
use App\Livewire\guest\SingleProductComponent;
use App\Livewire\guest\CartComponent;
use App\Livewire\guest\ShowOrder;
use App\Livewire\guest\UserProfile;



Route::get('/', function () {
    return view('landingpage');
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
    Route::get('/orders/{id}', ShowListOrder::class)->name('orders.show');
    Route::get('/admin/products', ManageProducts::class)->name('admin.products');
    Route::get('/admin/products/edit/{id}/', EditProduct::class)->name('admin.edit');
});








Route::get('/hidden-admin-register', [SuperAdminController::class, 'showRegistrationForm'])
    ->name('superadmin.register.form')
    ->middleware('checkSuperAdmin');

Route::post('/hidden-admin-register', [SuperAdminController::class, 'register'])
    ->name('superadmin.register');



Route::get('/product', BrowseProductsComponent::class)->name('products.browse');

Route::get('/product/{id}', SingleProductComponent::class)->name('product.show');

Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category.show');

Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {

    Route::get('/cart', CartComponent::class)->name('cart');
    // Route::get('/profile', UserProfile::class)->name('profile');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/up', [ProfileController::class, 'billing'])->name('profile.billing');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
