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
Route::prefix('Admin/Product/')->group(function(){
    Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.product');
    Route::get('/add_product', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.add_product');
});

Route::prefix('Admin/User/')->group(function(){
    Route::get('/user', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('users.user');
    Route::get('/add_user', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('users.add_user');
    Route::post('/add_user', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit_user', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('users.edit_user');
    Route::put('/{id}/edit_user', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('users.update_user');
    Route::delete('/{id}', [\App\Http\Controllers\EmployeeController::class, 'destroy'])->name('users.destroy_user');
});

Route::prefix('Admin/DashBoard/')->group(function(){
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.dashboard');
});


Route::prefix('Admin/Category/')->group(function(){
    Route::get('/category',[\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.category');
    Route::get('/add_category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.add_category');
    Route::post('/store_category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store_category');
    Route::get('/{id}/edit_category', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit_category');
    Route::put('/{id}/update_category', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update_category');
    Route::delete('/{id}/delete_category', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.delete_category');
});
