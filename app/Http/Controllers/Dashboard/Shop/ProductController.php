<?php
namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;


use App\Services\Media\MediaService;
use App\Services\Shop\CategoryService;
use App\Services\Shop\ColorService;
use App\Services\Shop\MaterialService;
use App\Services\Shop\ProductService;
use App\Services\Shop\SizeService;
use App\Services\Utility\CacheUtility;

class ProductController extends Controller
{
    protected ?ProductService $productService = null;
    protected ?ColorService $colorService = null;
    protected ?SizeService $sizeService = null;
    protected ?MaterialService $materialService = null;
    protected ?CategoryService $categoryService = null;
    protected ?MediaService $mediaService = null;

    private ?CacheUtility $cacheUtility = null;
    public function show(CacheUtility $cacheUtility,
    ProductService $productService,
    CategoryService $categoryService,
    ColorService $colorService,
    SizeService $sizeService,
    MaterialService $materialService,
    MediaService $mediaService,
    $id) {

        $this->cacheUtility = $cacheUtility;

        $cacheKey = $this->cacheUtility->generateModelCacheKey('product', $id);

        $details = $this->cacheUtility->remember($cacheKey, 1440, function () use ($id, $productService, $categoryService, $colorService, $sizeService, $materialService, $mediaService) {
            $this->productService = $productService;
            $this->categoryService = $categoryService;
            $this->sizeService = $sizeService;
            $this->colorService = $colorService;
            $this->materialService = $materialService;
            $this->mediaService = $mediaService;


            $product = $this->productService->getProductWithRelations($id);

            return  [
                'product' => $product,
                'categories' => $this->categoryService->getAllCategories(),
                'sizes' => $this->sizeService->getAllSizes(),
                'colors' => $this->colorService->getAllColors(),
                'materials' => $this->materialService->getAllMaterials(),
                'medias' => $this->mediaService->getAllMedias(),
            ];
        });

        return view('dashboard.shop.product.index', $details);
    }

    public function destroy(CacheUtility $cacheUtility, ProductService $productService ,$id) {
        $this->productService = $productService;
        $this->cacheUtility = $cacheUtility;
        $this->productService->deleteProduct($id);

        $cacheKey = $this->cacheUtility->generateModelCacheKey('product', $id);
        $this->cacheUtility->clearModelCache($cacheKey);

        return redirect(route('products.index'))->with('success', "Product Deleted Successfully");
    }

    public function create(
        CategoryService $categoryService,
        SizeService $sizeService,
        MaterialService $materialService,
        MediaService $mediaService,
    ) {
        $this->categoryService = $categoryService;
        $this->sizeService = $sizeService;
        $this->materialService = $materialService;
        $this->mediaService = $mediaService;

        return view('dashboard.shop.product.create', [
            'categories' => $this->categoryService->getAllCategories(),
            'sizes' => $this->sizeService->getAllSizes(),
            'materials' => $this->materialService->getAllMaterials(),
            'medias' => $this->mediaService->getAllMedias(),
        ]);
    }

    public function index(ProductService $productService) {
        $this->productService = $productService;

        $products = $this->productService->getAllProductsWithRelations();
        return view('dashboard.shop.products', compact('products'));
    }
}
