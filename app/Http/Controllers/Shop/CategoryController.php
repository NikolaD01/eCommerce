<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\Shop\ShopData;

class CategoryController extends Controller
{
    private $categories;

    public function __construct()
    {
        parent::__construct();
        $this->categories = $this->shopData->getAllCategories();
    }

    public function show($id)
    {
        $category = $this->shopData->getCategory($id);
        return view('dashboard.shop.category.index', ['category' => $category]);
    }
    public function index()
    {
        return view('dashboard.shop.categories', ['categories' => $this->categories]);
    }
}
