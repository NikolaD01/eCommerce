<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Shop\ShopData;

class ProductController extends Controller
{
    private $products;
    private $categories;
    private $sizes;
    private $colors;
    private $materials;
    public function __construct()
    {
        parent::__construct();
        $this->products = $this->shopData->getAllProducts();
        $this->categories = $this->shopData->getAllCategories();
        $this->sizes = $this->shopData->getAllSizes();
        $this->colors = $this->shopData->getAllColors();
        $this->materials = $this->shopData->getAllMaterials();
    }

    public function show($id) {
        $product = $this->shopData->getProduct($id);
        return view('dashboard.shop.product.index', [
            'product' => $product,
            'categories' => $this->categories,
            'sizes' => $this->sizes,
            'colors' => $this->colors,
            'materials' => $this->materials
        ]);
    }
    public function index()
    {
        $products = Product::all(); // Fetch products from the database or wherever they are stored
        return view('dashboard.shop.products', [
            'products' => $this->products,
        ]);
    }

}
