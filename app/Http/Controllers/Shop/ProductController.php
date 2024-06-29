<?php
namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Media\MediaService;
use App\Services\Shop\ProductService;
use App\Services\Shop\ColorService;
use App\Services\Shop\SizeService;
use App\Services\Shop\MaterialService;
use App\Services\Shop\CategoryService;

class ProductController extends Controller
{
    protected ProductService $productService;
    protected ColorService $colorService;
    protected SizeService $sizeService;
    protected MaterialService $materialService;
    protected CategoryService $categoryService;
    protected MediaService $mediaService;

    public function __construct() {
        $this->productService = app(ProductService::class);
        $this->colorService = app(ColorService::class);
        $this->sizeService = app(SizeService::class);
        $this->materialService = app(MaterialService::class);
        $this->categoryService = app(CategoryService::class);
        $this->mediaService = app(MediaService::class);
    }

    public function show($id) {
        $product = $this->productService->getProductWithRelations($id);
        return view('dashboard.shop.product.index', [
            'product' => $product,
            'categories' => $this->categoryService->getAllCategories(),
            'sizes' => $this->sizeService->getAllSizes(),
            'colors' => $this->colorService->getAllColors(),
            'materials' => $this->materialService->getAllMaterials(),
            'medias' => $this->mediaService->getAllMedias(),
        ]);
    }

    public function destroy($id)
    {
        $product = $this->productService->deleteProduct($id);
        return redirect(route('products.index'))->with('success', "Product Deleted Successfully");
    }
    public function create()
    {
        return view('dashboard.shop.product.create', ['categories' => $this->categoryService->getAllCategories(),
            'sizes' => $this->sizeService->getAllSizes(),
            'materials' => $this->materialService->getAllMaterials(),
            'medias' => $this->mediaService->getAllMedias(),
        ]);
    }
    public function index()
    {


        $products = $this->productService->getAllProductsWithRelations();
        return view('dashboard.shop.products', compact('products'));
    }
}
