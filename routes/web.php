<?php


use App\Http\Controllers\Dashboard\Media\MediaController;
use App\Http\Controllers\Dashboard\Shop\CategoryController;
use App\Http\Controllers\Dashboard\Shop\ColorController;
use App\Http\Controllers\Dashboard\Shop\MaterialController;
use App\Http\Controllers\Portal\OrderController;
use App\Http\Controllers\Dashboard\Shop\ProductController;
use App\Http\Controllers\Dashboard\Shop\SizeController;

use App\Http\Controllers\Portal\PortalProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::controller(OrderController::class)->group(function () {
    });
    Route::controller(PortalProductController::class)->group(function () {
        Route::get('products', 'index')->name('portal.products.index');
        Route::get('products/{product}', 'show')->name('portal.products.show');
    });
});



Route::prefix('dashboard')->group(function () {
   Route::view('/', 'dashboard')->name('dashboard');

   Route::prefix('shop')->group(function () {
       Route::view('/', 'dashboard.shop.index')->name('shop');

       Route::resource('products', ProductController::class);
       Route::resource('categories', CategoryController::class);
       Route::resource('materials', MaterialController::class);
       Route::resource('colors', ColorController::class);
       Route::resource('sizes', SizeController::class);

       Route::resource('medias', MediaController::class);
   });
})->middleware(['auth', 'verified']);



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
