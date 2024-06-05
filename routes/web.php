<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Controllers\Shop\Categories;
use App\Livewire\Controllers\Shop\Products;
use App\Livewire\Controllers\Shop\Orders;

Route::view('/', 'welcome');

Route::prefix('dashboard')->group(function () {
   Route::view('/', 'dashboard')->name('dashboard');
   Route::prefix('shop')->group(function () {
       Route::view('/', 'dashboard.shop.index')->name('shop');

       Route::get('/products', [Products::class, 'render'])->name('products');

       Route::get('/categories', [Categories::class, 'render'])->name('categories');

       Route::get('/orders', [Orders::class, 'render'])->name('orders');

   });
})->middleware(['auth', 'verified']);



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
