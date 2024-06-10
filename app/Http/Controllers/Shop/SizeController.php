<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    private $sizes;

    public function __construct()
    {
        parent::__construct();
        $this->sizes = $this->shopData->getAllSizes();
    }

    public function index()
    {
            return view('dashboard.shop.sizes', ['sizes' => $this->sizes]);
    }
}
