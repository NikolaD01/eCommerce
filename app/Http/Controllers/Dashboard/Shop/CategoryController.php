<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Shop\CategoryService;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = app(CategoryService::class);
    }

    public function destroy($id)
    {
        if(!$this->categoryService->deleteCategory($id))
        {
          return redirect()->back()->with('error', 'Not found category');
        }
        return redirect()->back()->with('success', 'Category deleted');
    }
    public function show($id)
    {
        $category = $this->categoryService->getCategory($id);
        if(!$category)
        {
            return redirect()->back()->with('error', 'Not found category');
        }
        return view('dashboard.shop.category.index', ['category' => $category]);
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('dashboard.shop.categories', ['categories' => $categories]);
    }
}
