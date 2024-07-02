<?php

namespace App\Livewire;

use App\Services\Media\MediaService;
use Livewire\Component;
use Livewire\Attributes\On;

use App\Services\Shop\ProductService;
use Illuminate\Support\Facades\App;

class ProductView extends Component
{
    public $product;
    public $media;
    public $colors;
    protected productService $productService;
    protected mediaService $mediaService;

    public function mount($product)
    {
        $this->product = $product;
        $this->media = $product->medias[0];

        $this->mediaService = app(MediaService::class);
        $this->colors = $this->mediaService->getMediaByProduct($this->product->id)->pluck('color')->unique('id');
    }

    #[On('color')]
    public function color($product,$color)
    {
        $this->mediaService = app(MediaService::class);
        return $this->media = $this->mediaService->getMediaColor($product, $color)->first();
    }
    #[On('refresh')]
    public function refresh()
    {
        $this->productService = app(ProductService::class);
        return $this->product = $this->productService->getProductWithRelations($this->product->id);
    }

    public function render()
    {
        return view('livewire.product-view');
    }
}
