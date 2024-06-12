<?php

namespace App\Livewire;

use App\Models\Category;
use App\Services\Shop\Product\ProductImport;
use Livewire\Component;

class ProductUpdateForm extends Component
{
    public $data;
    public $product;
    public $title;
    public $desc;
    public $price;
    public $category = [];
    public $materials = [];
    public $sizes = [];
    public $colors = [];
    protected $productImport;
    public function __construct()
    {
        $this->productImport = new ProductImport();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|array',
            'materials' => 'required|array',
            'sizes' => 'required|array',
            'colors' => 'required|array',
        ]);

        $data = [
            'title' => $this->title,
            'desc' => $this->desc,
            'price' => $this->price,
            'category' => $this->category,
            'materials' => $this->materials,
            'sizes' => $this->sizes,
            'colors' => $this->colors,
        ];
        $this->productImport->handleData($data);
    }
    public function mount($data)
    {
      $this->data = $data;
    }
    public function render()
    {
        return view('livewire.product-update-form');
    }
}
