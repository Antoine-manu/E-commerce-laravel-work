<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders')->middleware('auth');

Route::get('/', [ProductController::class, 'showAll']);

Route::get('/product/{id}', [ProductController::class, 'showPublic'])->name('product.showPublic');
Route::resource('products', ProductController::class);
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/contact', function () {
    $user = auth()->user();
    return view('contact', ['user' => $user]);
});
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
