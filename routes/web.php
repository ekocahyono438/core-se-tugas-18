<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Models\product;


Route::middleware('auth')->group(function(){

//Route untuk customer
Route::get('/', [CustomerController::class, 'index']);

Route::get('/customers', [CustomerController::class, 'index'])
    ->middleware('can:view.customers')
    ->name("customers");

Route::get('/customers/create',[CustomerController::class, 'create'])
    ->middleware('can:manage.customers')
    ->name('customers.create');

Route::get('/customers/{id}',[CustomerController::class, 'show'])
    ->middleware('can:view.customers')
    ->name('customers.show');

Route::put('/customers/{id}',[CustomerController::class, 'update'])
    ->middleware('can:manage.customers')
    ->name('customers.update');

Route::delete('/customers/{id}',[CustomerController::class, 'destroy'])
    ->middleware('can:delete.customers')
    ->name('customers.delete');

Route::get('/customers/{id}/edit',[CustomerController::class, 'edit'])
    ->middleware('can:manage.customers')
    ->name('customers.edit');

Route::post('/customers/store',[CustomerController::class, 'store'])
    ->middleware('can:manage.customers')
    ->name('customers.store');
//Akhir Route Buat Custoomer

// Route untuk product
Route::get('/products', [ProductsController::class, 'index'])->name("products");
Route::get('/products/create',[ProductsController::class, 'create'])->name('products.create');
Route::post('/products/store',[productsController::class, 'store'])->name('products.store');
Route::put('/products/{id}',[productsController::class, 'update'])->name('products.update');
Route::delete('/products/{id}',[ProductsController::class, 'destroy'])->name('products.delete');
Route::get('/products/{id}/edit',[ProductsController::class, 'edit'])->name('products.edit');
Route::get('/products/{id}',[ProductsController::class, 'show'])->name('products.show');
// Akhir Route buat Product

// route untuk orders
Route::get('/orders', [OrderController::class, 'orders']);
Route::get('/orders', [OrderController::class, 'index'])
    ->middleware('can:view.orders')
    ->name("orders");

Route::get('/orders/create',[OrderController::class, 'create'])
    ->middleware('can:manager.orders')
    ->name('orders.create');

Route::post('/orders/store',[OrderController::class, 'store'])
    ->middleware('can:manager.orders')
    ->name('orders.store');

Route::put('/orders/{id}',[OrderController::class, 'update'])
    ->middleware('can:manager.orders')
    ->name('orders.update');

Route::delete('/orders/{id}',[OrderController::class, 'destroy'])
    ->middleware('can:delete.orders')
    ->name('orders.delete');

Route::get('/orders/{id}/edit',[OrderController::class, 'edit'])
    ->middleware('can:manager.orders')
    ->name('orders.edit');

Route::patch('/orders/{order}/approve',[OrderController::class, 'approve'])
    ->middleware('can:approve.orders,order')
    ->name('orders.approve');

Route::get('/orders/{id}',[OrderController::class, 'show'])
    ->middleware('can:view.orders')
    ->name('orders.show');
//Akhir Route untuk order

Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");

Route::get('/about', [AboutController::class, 'about']);
 
});


 

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard',[CustomerController::class, 'index'])->name("customers");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
