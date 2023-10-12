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
Route::prefix('Client/')->group(function(){
    Route::get('/home', [\App\Http\Controllers\User\HomePageController::class, 'index'])->name('client.home');
    Route::get('/product', [\App\Http\Controllers\User\HomePageController::class, 'product'])->name('client.product');
    Route::get('/cart', [\App\Http\Controllers\User\HomePageController::class, 'cart'])->name('client.cart');
    Route::get('/{product}/detail', [\App\Http\Controllers\User\HomePageController::class, 'detail'])->name('client.detail');

});
Route::prefix('Admin/Product/')->group(function(){
    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.product');
    Route::get('/add_product', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.add_product');
    Route::post('/add_product', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store_product');
    Route::get('/{product}/edit_product', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit_product');
    Route::put('/{product}/edit_product', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update_product');
    Route::delete('/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy_product');
    Route::get('{product}/add_to_cart', [\App\Http\Controllers\Admin\ProductController::class, 'addToCart'])->name('products.add_to_cart');
    Route::get('/cart', [\App\Http\Controllers\Admin\ProductController::class, 'cart'])->name('products.cart');
});

Route::prefix('Admin/User/')->group(function(){
    Route::get('/user', [\App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('users.user');
    Route::get('/add_user', [\App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('users.add_user');
    Route::post('/add_user', [\App\Http\Controllers\Admin\EmployeeController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit_user', [\App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('users.edit_user');
    Route::put('/{id}/edit_user', [\App\Http\Controllers\Admin\EmployeeController::class, 'update'])->name('users.update_user');
    Route::delete('/{id}', [\App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('users.destroy_user');
});

Route::prefix('Admin/DashBoard/')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.dashboard');
    Route::get('/add_dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'create'])->name('dashboard.add_dashboard');
});
Route::prefix('Admin/login/')->group(function(){
    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'index'])->name('Admin.login');
});

Route::prefix('Admin/Category/')->group(function(){
    Route::get('/category',[\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.category');
    Route::get('/add_category', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('categories.add_category');
    Route::post('/store_category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('categories.store_category');
    Route::get('/{category}/edit_category', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('categories.edit_category');
    Route::put('/{category}/update_category', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('categories.update_category');
    Route::delete('/{category}/delete_category', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('categories.delete_category');
});

Route::prefix('Admin/Table/')->group(function(){
    Route::get('/table_management',[\App\Http\Controllers\Admin\TableCoffeeController::class, 'index'])->name('tables.table_management');
    Route::get('/table',[\App\Http\Controllers\Admin\TableCoffeeController::class, 'index1'])->name('tables.table');
    Route::get('/add_table', [\App\Http\Controllers\Admin\TableCoffeeController::class, 'create'])->name('tables.add_table');
    Route::post('/store_table', [\App\Http\Controllers\Admin\TableCoffeeController::class, 'store'])->name('tables.store_table');
    Route::get('/{id}/edit_table', [\App\Http\Controllers\Admin\TableCoffeeController::class, 'edit'])->name('tables.edit_table');
    Route::put('/{id}/update_table', [\App\Http\Controllers\Admin\TableCoffeeController::class, 'update'])->name('tables.update_table');
    Route::delete('/{id}/delete_table', [\App\Http\Controllers\Admin\TableCoffeeController::class, 'destroy'])->name('tables.delete_table');
});
