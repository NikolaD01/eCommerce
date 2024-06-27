<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Services\Shop\ProductService;
use Illuminate\Support\Facades\App;

class ProductView extends Component
{
    public $product;
    protected productService $productService;

    public function mount($product)
    {
        $this->product = $product;
    }

    #[On('refresh')]
    public function refresh()
    {
        $this->product = $this->productService->getProductWithRelations($this->product->id);
    }

    public function render()
    {
        return view('livewire.product-view');
    }

    public function hydrate()
    {
        $this->productService = App::make(ProductService::class);
    }
}
