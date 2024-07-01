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
    public function show($id) {

        $this->cacheUtility = app(CacheUtility::class);

        $cacheKey = $this->cacheUtility->generateModelCacheKey('product', $id);

        $details = $this->cacheUtility->remember($cacheKey, 1440, function () use ($id) {
            $this->productService = app(ProductService::class);
            $this->categoryService = app(CategoryService::class);
            $this->sizeService = app(SizeService::class);
            $this->colorService = app(ColorService::class);
            $this->materialService = app(MaterialService::class);
            $this->mediaService = app(MediaService::class);


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

    public function destroy($id) {
        $this->productService = app(ProductService::class);

        $this->productService->deleteProduct($id);
        $this->cacheUtility = app(CacheUtility::class);
        $cacheKey = $this->cacheUtility->generateModelCacheKey('product', $id);
        $this->cacheUtility->clearModelCache($cacheKey);

        return redirect(route('products.index'))->with('success', "Product Deleted Successfully");
    }

    public function create() {
        $this->categoryService = app(CategoryService::class);
        $this->sizeService = app(SizeService::class);
        $this->materialService = app(MaterialService::class);
        $this->mediaService = app(MediaService::class);

        return view('dashboard.shop.product.create', [
            'categories' => $this->categoryService->getAllCategories(),
            'sizes' => $this->sizeService->getAllSizes(),
            'materials' => $this->materialService->getAllMaterials(),
            'medias' => $this->mediaService->getAllMedias(),
        ]);
    }

    public function index() {
        $this->productService = app(ProductService::class);

        $products = $this->productService->getAllProductsWithRelations();
        return view('dashboard.shop.products', compact('products'));
    }
}
