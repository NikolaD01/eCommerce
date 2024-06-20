<?php

namespace App\Services\Shop;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
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

    public function getProductWithRelations($id)
    {
        return $this->productRepository->getByIdWithRelations($id);
    }
    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

    public function createProduct(array $data)
    {
        DB::beginTransaction();

        try {
            $product = $this->productRepository->create($data);
            $this->productRepository->syncRelations($product, $data);

            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateProduct($id, array $data)
    {
        DB::beginTransaction();

        try {
            $product = $this->productRepository->update($id, $data);
            $this->productRepository->syncRelations($product, $data);

            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
