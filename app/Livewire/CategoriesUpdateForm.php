<?php

namespace App\Livewire;

use App\Services\Shop\CategoryService;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CategoriesUpdateForm extends Component
{

    public $categories;

    public int $category;

    #[Validate('required|string')]
    public string $name;
    protected CategoryService $categoryService;
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
