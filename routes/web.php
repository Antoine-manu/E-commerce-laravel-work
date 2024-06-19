<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth; // Add this line

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $user = auth()->user();
    return view('products/products', ['user' => $user]);
});

Route::get('/product/{id}', [ProductController::class, 'showPublic'])->name('product.show');
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
