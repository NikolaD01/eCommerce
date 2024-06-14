<?php

namespace App\Services\Shop;

use App\Interfaces\BaseRepositoryInterface;

class CategoryService
{
    protected BaseRepositoryInterface $categoryRepository;

    public function __construct(BaseRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategory($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }
}
