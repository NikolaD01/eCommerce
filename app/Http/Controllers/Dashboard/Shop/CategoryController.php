<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\CategoryService;

class CategoryController extends Controller
{
    private $categories;
    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = app(CategoryService::class);
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->back();
    }
    public function show($id)
    {
        $category = $this->categoryService->getCategory($id);
        return view('dashboard.shop.category.index', ['category' => $category]);
    }
    public function index()
    {
        $this->categories = $this->categoryService->getAllCategories();
        return view('dashboard.shop.categories', ['categories' => $this->categories]);
    }
}
