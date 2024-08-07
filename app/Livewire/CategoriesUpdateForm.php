<?php

namespace App\Livewire;

use App\Services\Shop\CategoryService;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CategoriesUpdateForm extends Component
{

    public $categories;

    #[Validate('nullable')]
    public int $category;

    #[Validate('required|string')]
    public string $name;
    protected CategoryService $categoryService;

    public function save(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->validate();

        if(!isset($this->category))
        {
            $data = [
                'category_name' => $this->name,
            ];
            $message = $this->categoryService->createCategory($data);
            return redirect(route('categories.index'))->with('message', 'Category created successfully!');
        }
        else
        {
            $data = [
                'category_name' => $this->name,
                'category_id' => $this->category,
            ];
            $message = $this->categoryService->createCategory($data);
            return redirect(route('categories.index'))->with('message', 'Category created successfully!');
        }





    }
    public function render(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->categories = $this->categoryService->getAllCategories();
        return view('livewire.categories-update-form');
    }
}
