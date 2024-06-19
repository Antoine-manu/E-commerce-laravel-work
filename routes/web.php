<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('products/products');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
