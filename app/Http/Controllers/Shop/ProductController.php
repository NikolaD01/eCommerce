<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Shop\ShopData;

class ProductController extends Controller
{
    private $shopData;
    private $products;
    public function __construct()
    {
        $this->shopData = new ShopData();
        $this->products = $this->shopData->getAllProducts();
    }
    public function index()
    {
        $products = Product::all(); // Fetch products from the database or wherever they are stored
        return view('dashboard.shop.products', ['products' => $this->products]);
    }

    public function show($id) {
       $product = $this->shopData->getProduct($id);
       return view('dashboard.shop.product.index', ['product' => $product]);
    }
}
