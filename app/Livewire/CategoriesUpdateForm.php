<?php

namespace App\Livewire;

use App\Services\Shop\CategoryService;
use Livewire\Component;

class CategoriesUpdateForm extends Component
{

    public $categories;

    public $category;
    public $name;
    protected $categoryService;
    protected $rules = [
        'name' => 'required',
    ];
    public function __construct()
    {
        $this->categoryService = app(CategoryService::class);
        $this->categories = $this->categoryService->getAllCategories();
    }

    public function save()
    {
        $this->validate();

        $data = [
            'categoryName' => $this->name,
            'parent_id' => $this->category,
        ];

        $message = $this->categoryService->createCategory($data);
        session()->flash('message', 'Category crated successfully!');

    }
    public function render()
    {
        return view('livewire.categories-update-form');
    }
}
