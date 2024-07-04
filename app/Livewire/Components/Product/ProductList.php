<?php

namespace App\Livewire\Components\Product;

use App\Services\Shop\ProductService;
use Livewire\Component;

class ProductList extends Component
{
    public $products;
    public function render(ProductService $productService)
    {
        $this->products = $productService->getAllProductsWithRelations();

        return view('livewire.components.product.product-list');
    }
}
