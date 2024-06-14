<?php
namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\ProductService;
use App\Services\Shop\ColorService;
use App\Services\Shop\SizeService;
use App\Services\Shop\MaterialService;
use App\Services\Shop\CategoryService;

class ProductController extends Controller
{
    protected $productService;
    protected $colorService;
    protected $sizeService;
    protected $materialService;
    protected $categoryService;

    public function __construct(
        ProductService $productService,
        ColorService $colorService,
        SizeService $sizeService,
        MaterialService $materialService,
        CategoryService $categoryService
    ) {
        $this->productService = $productService;
        $this->colorService = $colorService;
        $this->sizeService = $sizeService;
        $this->materialService = $materialService;
        $this->categoryService = $categoryService;
    }

    public function show($id) {
        $product = $this->productService->getProduct($id);
        return view('dashboard.shop.product.index', [
            'product' => $product,
            'categories' => $this->categoryService->getAllCategories(),
            'sizes' => $this->sizeService->getAllSizes(),
            'colors' => $this->colorService->getAllColors(),
            'materials' => $this->materialService->getAllMaterials()
        ]);
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('dashboard.shop.products', [
            'products' => $products,
        ]);
    }
}
