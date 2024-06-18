<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('products/products');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
