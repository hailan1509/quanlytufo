<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the " web\ middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Controllers\LandingController::class)->name('welcome');
Route::get('/product/{product}', \App\Http\Controllers\ProductDetailController::class)->name('product.detail');
Auth::routes();

Route::middleware('auth')->group(function () {
 Route::resource('product-categories', \App\Http\Controllers\ProductCategoryController::class)
 ->parameters(['product-categories' => 'productCategory']);
 Route::resource('products', \App\Http\Controllers\ProductController::class);
 Route::resource('orders', \App\Http\Controllers\OrderController::class)->only(['index','show','update']);
});
