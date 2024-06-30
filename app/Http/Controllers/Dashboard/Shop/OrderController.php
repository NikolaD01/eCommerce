<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\ShopData;

class OrderController extends Controller
{
    public function index()
    {
        return view('dashboard.shop.orders');
    }
}
