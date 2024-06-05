<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Shop\ShopData;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.shop.categories');
    }
}
