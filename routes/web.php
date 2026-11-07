<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Models\product;

//Route untuk customer
Route::get('/', [CustomerController::class, 'index']);
Route::get('/customers', [CustomerController::class, 'index'])->name("customers");
Route::get('/customers/create',[CustomerController::class, 'create'])->name('customers.create');
Route::get('/customers/{id}',[CustomerController::class, 'show'])->name('customers.show');
Route::put('/customers/{id}',[CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}',[CustomerController::class, 'destroy'])->name('customers.delete');
Route::get('/customers/{id}/edit',[CustomerController::class, 'edit'])->name('customers.edit');
Route::post('/customers/store',[CustomerController::class, 'store'])->name('customers.store');
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



Route::get('/orders', [OrderController::class, 'orders']);
Route::get('/about', [AboutController::class, 'about']);
 
 