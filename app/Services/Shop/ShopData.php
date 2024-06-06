<?php

namespace App\Services\Shop;

use App\Models\Product;

class ShopData
{
    public function getAllProducts() {
        $products = Product::all();

        return $products;
    }

    public function getProduct($id) {
        $product = Product::find($id);
        return $product;
    }
}
