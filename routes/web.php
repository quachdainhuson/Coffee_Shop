<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('Admin/Product/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.product');
Route::get('Admin/Product/add_product', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.add_product');
