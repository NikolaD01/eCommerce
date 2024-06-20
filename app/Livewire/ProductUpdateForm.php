<?php

namespace App\Livewire;

use Livewire\Component;

use App\Services\Shop\ProductService;

class ProductUpdateForm extends Component
{
    protected $productService;
    public $data;
    public $product;
    public $title;
    public $description;
    public $price;
    public $categories = [];
    public $materials = [];
    public $sizes = [];
    public $colors = [];

    protected $rules =  [ 'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'categories' => 'required|array',
        'materials' => 'required|array',
        'sizes' => 'required|array',
        'colors' => 'required|array',];

    public function __construct($id = null)
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

        if(isset($this->data['product']))
        {
            $message = $this->productService->updateProduct($this->data['product']->id, $data);

            session()->flash('message', 'Product updated successfully!');
            $this->dispatch('refresh');
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
        if(isset($data['product']))
        {
            $this->title = $data['product']->title;
            $this->description = $data['product']->description;
            $this->price = $data['product']->price;
            $this->categories = $data['product']->categories->pluck('id')->toArray();
            $this->materials = $data['product']->materials->pluck('id')->toArray();
            $this->sizes = $data['product']->sizes->pluck('id')->toArray();
            $this->colors = $data['product']->colors->pluck('id')->toArray();
        }

    }
    public function render()
    {
        return view('livewire.product-update-form');
    }
}
