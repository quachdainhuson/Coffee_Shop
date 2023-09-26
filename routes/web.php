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
    Route::get('/{employee_id}/edit_user', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('users.edit_user');
    Route::put('/{employee_id}/edit_user', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('users.update_user');
    Route::delete('/{employee_id}', [\App\Http\Controllers\EmployeeController::class, 'destroy'])->name('users.destroy_user');
});


