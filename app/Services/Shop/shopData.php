<?php

namespace App\Services\Shop;

use App\Models\Product;

class ShopData
{
    public function getAllProducts() {
        $products = Product::all();

        return $products;
    }
}
