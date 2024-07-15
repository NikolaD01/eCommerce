<?php

namespace App\Livewire\Portal\Products;

use App\Services\Shop\ProductService;
use App\Services\Media\MediaService;
use Livewire\Component;
use App\Services\Utility\CartUtility;
class SingleView extends Component
{
    public $product;
    public $medias;
    public $media;
    public $colors;
    public $quantity;
    public $selectedColor;
    public $selectedSize;

    protected ProductService $productService;
    protected MediaService $mediaService;
    public function mount($product, ProductService $productService, MediaService $mediaService)
    {
        $this->productService = $productService;
        $this->mediaService = $mediaService;

        $this->product = $this->productService->getProduct($product);
        $this->medias = $this->product->medias;
        $this->media = $this->product->medias[0];
        $this->colors = $this->mediaService->getMediaByProduct($this->product->id)->pluck('color')->unique('id');
    }

    public function selectColor($colorId)
    {
        $this->selectedColor = $colorId;
    }

    public function selectSize($sizeName)
    {
        $this->selectedSize = $sizeName;
    }

    public function addToCart()
    {
        $data = [
          'product_id' => $this->product->id,
          'quantity' => (int) $this->quantity,
          'color' => $this->selectedColor,
          'size' => $this->selectedSize,
        ];

        CartUtility::addToCart($data);
    }
    public function render()
    {
        return view('livewire.portal.products.single-view');
    }
}
