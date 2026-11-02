<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;


Route::get('/customers', [CustomerController::class, 'index']);

Route::get('/products', [ProductsController::class, 'products']);
Route::get('/orders', [OrderController::class, 'orders']);
Route::get('/about', [AboutController::class, 'about']);
 
 