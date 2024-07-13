<?php

namespace App\Livewire;

use App\Services\Utility\CacheUtility;
use Livewire\Component;
use Livewire\Attributes\Validate;

use App\Services\Shop\ProductService;

class ProductUpdateForm extends Component
{
    public array $data;
    public $product;

    #[Validate('required|string|max:255')]
    public string $title;
    #[Validate('required|string')]
    public string $description;
    #[Validate('required|decimal:0,2')]
    public float $price;
    #[Validate('required|integer')]
    public int $quantity;
    #[Validate('required|array')]
    public array $categories = [];
    #[Validate('required|array')]
    public array $materials = [];
    #[Validate('required|array')]
    public array $sizes = [];
    #[Validate('required|array')]
    public array $medias = [];

    protected ?CacheUtility $cacheUtility = null;
    protected ProductService $productService;

    public function save(ProductService $productService, CacheUtility $cacheUtility)
    {
        $this->productService = $productService;
        $this->cacheUtility = $cacheUtility;

        $this->validate();


        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'categories' => $this->categories,
            'materials' => $this->materials,
            'sizes' => $this->sizes,
            'medias' => $this->medias
        ];




        if(isset($this->product))
        {
            $message = $this->productService->updateProduct($this->product->id, $data);

            $cacheKey = $this->cacheUtility->generateModelCacheKey('product', $this->product->id);
            $this->cacheUtility->clearModelCache($cacheKey);

            session()->flash('message', 'Product updated successfully!');
            return $this->dispatch('refresh');

        }
        else
        {
            $this->product = $this->productService->createProduct($data);
            $cacheKey = $this->cacheUtility->generateModelCacheKey('product', $this->product->id);
            $this->cacheUtility->clearModelCache($cacheKey);
            return redirect(route('products.index'))->with('success', "Product created");
        }



    }
    public function mount($data)
    {
        $this->data = $data;
        if(isset($this->data['product']))
        {
            $this->product = $data['product'];
            $this->title =  $this->product->title;
            $this->description =  $this->product->description;
            $this->price =  $this->product->price;
            $this->quantity = $this->product->quantity;
            $this->categories =  $this->product->categories->pluck('id')->toArray();
            $this->materials =  $this->product->materials->pluck('id')->toArray();
            $this->sizes =  $this->product->sizes->pluck('id')->toArray();
            $this->medias =  $this->product->medias->pluck('id')->toArray();
        }
    }
    public function render()
    {
        return view('livewire.product-update-form');
    }
}
