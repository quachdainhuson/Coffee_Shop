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

Route::get('Admin/Category/category',[\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.category');
Route::get('Admin/Category/add_category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.add_category');
Route::post('Admin/Category/store_category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store_category');
Route::get('Admin/Category/{cate_id}/edit_category', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit_category');
Route::put('Admin/Category/{cate_id}/update_category', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update_category');
Route::delete('Admin/Category/{cate_id}/delete_category', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.delete_category');