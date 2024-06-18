<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth; // Add this line

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('products/products');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/profil', function () {
    return view('profil');
});

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
