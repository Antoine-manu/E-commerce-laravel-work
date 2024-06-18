<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('products/products');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show')->middleware('auth');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add')->middleware('auth');

Route::get('/orders', [OrderController::class, 'index'])->name('orders')->middleware('auth');

Route::get('/profil', function () {
    return view('profil');
})->middleware('auth');


Route::get('/contact', function () {
    return view('contact');
})->name('contact.form');


Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
