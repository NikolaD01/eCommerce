<?php

namespace App\Livewire\Portal\Products;

use App\Services\Shop\ProductService;
use App\Services\Media\MediaService;
use Livewire\Component;

class SingleView extends Component
{
    public $product;
    public $medias;
    public $media;
    public $colors;
    protected ProductService $productService;
    protected MediaService $mediaService;
    public function mount($product)
    {
        $this->product = $this->productService->getProduct($product);
        $this->medias = $this->product->medias;
        $this->media = $this->product->medias[0];
        $this->colors = $this->mediaService->getMediaByProduct($this->product->id)->pluck('color')->unique('id');
    }

    public function __construct()
    {
        $this->mediaService = app(MediaService::class);
        $this->productService = app(ProductService::class);
    }

    public function render()
    {
        return view('livewire.portal.products.single-view');
    }
}
