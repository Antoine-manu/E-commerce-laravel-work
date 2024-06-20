<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'showAll'])->name('home');

Route::get('/product/{id}', [ProductController::class, 'showPublic'])->name('product.showPublic');
Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/order', [OrderController::class, 'createOrder'])->name('order.create');
    Route::get('/order/success/{orderId}', [OrderController::class, 'orderSuccess'])->name('order.success');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/contact', function () {
    $user = auth()->user();
    return view('contact', ['user' => $user]);
});

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
