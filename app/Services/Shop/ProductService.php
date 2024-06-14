<?php

namespace App\Services\Shop;

use App\Interfaces\BaseRepositoryInterface;

class ProductService
{
    protected BaseRepositoryInterface $productRepository;

    public function __construct(BaseRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getProduct($id)
    {
        return $this->productRepository->getById($id);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct($id, array $data)
    {
        return $this->productRepository->update($id, $data);
    }
}
