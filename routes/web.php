<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Http\Controllers\Employee\ProductController as EmployeeProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::middleware(['is_admin'])->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::get('product/variation/create/{product_id}', [ProductVariationController::class, 'create'])->name('add.variation');
        Route::get('product/variation/{product_id}', [ProductVariationController::class, 'index'])->name('list.variation');
        Route::resource('product/variation', ProductVariationController::class)->except([
            'index', 'create'
        ]);
    });
    Route::middleware(['IsEmployee'])->group(function () {
        Route::get('product_list', [EmployeeProductController::class, 'list'])->name('product.list');
        Route::get('product_details/{product_id}', [EmployeeProductController::class, 'details'])->name('product.details');
        Route::get('add/cart/{variation_id}', [EmployeeProductController::class, 'addCart'])->name('add.cart');
    }); 
});

