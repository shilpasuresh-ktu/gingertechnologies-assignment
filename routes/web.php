<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('products.addToCart');
Route::get('/cart', [ProductController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/send-to-whatsapp', [ProductController::class, 'sendToWhatsApp'])->name('cart.sendToWhatsApp');
