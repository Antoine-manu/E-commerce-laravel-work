<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');


