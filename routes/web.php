<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;

Route::get('/', [CustomerController::class, 'index']);

Route::get('/customers', [CustomerController::class, 'index'])->name("customers");
Route::get('/customers/create',[CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store',[CustomerController::class, 'store'])->name('customers.store');

Route::get('/products', [ProductsController::class, 'products']);
Route::get('/orders', [OrderController::class, 'orders']);
Route::get('/about', [AboutController::class, 'about']);
 
 