<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

use App\Services\Shop\ProductService;

class ProductUpdateForm extends Component
{
    protected ProductService $productService;
    public array $data;
    public $product;

    #[Validate('required|string|max:255')]
    public string $title;
    #[Validate('required|string')]
    public string $description;
    #[Validate('required|numeric')]
    public int $price;
    #[Validate('required|array')]
    public array $categories = [];
    #[Validate('required|array')]
    public array $materials = [];
    #[Validate('required|array')]
    public array $sizes = [];
    #[Validate('required|array')]
    public array $colors = [];

    public function __construct()
    {
        $this->productService = app(ProductService::class);
    }
    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'categories' => $this->categories,
            'materials' => $this->materials,
            'sizes' => $this->sizes,
            'colors' => $this->colors,
        ];

        if(isset($this->product))
        {
            $message = $this->productService->updateProduct($this->product->id, $data);

            session()->flash('message', 'Product updated successfully!');
            return $this->dispatch('refresh');
        }
        else
        {
            $this->productService->createProduct($data);
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
            $this->categories =  $this->product->categories->pluck('id')->toArray();
            $this->materials =  $this->product->materials->pluck('id')->toArray();
            $this->sizes =  $this->product->sizes->pluck('id')->toArray();
            $this->colors =  $this->product->colors->pluck('id')->toArray();
        }

    }
    public function render()
    {
        return view('livewire.product-update-form');
    }
}
