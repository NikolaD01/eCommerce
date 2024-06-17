<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\CategoryService;

class CategoryController extends Controller
{
    private $categories;
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->categories = $this->categoryService->getAllCategories();
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategory($id);
        return view('dashboard.shop.category.index', ['category' => $category]);
    }
    public function index()
    {
        return view('dashboard.shop.categories', ['categories' => $this->categories]);
    }
}
