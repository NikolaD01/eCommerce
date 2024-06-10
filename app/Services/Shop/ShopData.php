<?php

namespace App\Services\Shop;

use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Product;
use App\Models\Size;

class ShopData
{
    //TODO: Separate into Services(Products,Categories,Colors,Sizes,Materials)
    public function getAllProducts() {
        return Product::all();
    }

    public function getProduct($id) {
        return Product::find($id);
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategory($id)
    {
        return Category::find($id);
    }

    public function getAllMaterials()
    {
        return Material::all();
    }

    public function getMaterial($id)
    {
        return Material::find($id);
    }

    public function getAllColors()
    {
        return Color::all();
    }

    public function getColor($id)
    {
        return Color::find($id);
    }

    public function getAllSizes()
    {
        return Size::all();
    }

    public function getSize($id)
    {
        return Size::find($id);
    }
}
