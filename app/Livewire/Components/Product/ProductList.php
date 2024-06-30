<?php

namespace App\Livewire\Components\Product;

use App\Services\Shop\ProductService;
use Livewire\Component;

class ProductList extends Component
{
    public $products;

    protected ProductService $productService;
    public function __construct()
    {
        $this->productService = app(ProductService::class);
        $this->products = $this->productService->getAllProductsWithRelations();
    }


    public function render()
    {
        return view('livewire.components.product.product-list');
    }
}
