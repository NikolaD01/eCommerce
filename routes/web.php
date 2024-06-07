<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\OrderController;

Route::view('/', 'welcome');

Route::prefix('dashboard')->group(function () {
   Route::view('/', 'dashboard')->name('dashboard');

   Route::prefix('shop')->group(function () {
       Route::view('/', 'dashboard.shop.index')->name('shop');

       Route::resource('products', ProductController::class);
       Route::resource('categories', CategoryController::class);


       Route::get('/orders', [OrderController::class, 'index'])->name('orders');

   });
})->middleware(['auth', 'verified']);



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
