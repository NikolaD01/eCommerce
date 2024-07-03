<?php

namespace App\Services\Shop;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductService
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAllProducts()
    {
        $products = $this->productRepository->getAll();
        return $products->map(function ($product) {
            $product->price = $this->intoCents($product->price);
            return $product;
        }, $products);
    }
    public function getAllProductsWithRelations()
    {
        $products = $this->productRepository->getAllWithRelations();
        return $products->map(function($product) {
            $product->price = $this->intoEuro($product->price);
            return $product;
        }, $products);

    }
    public function getProduct($id)
    {
        $product = $this->productRepository->getById($id);
        $product->price = $this->intoEuro($product->price);
        return $product;
    }

    public function getProductWithRelations($id)
    {
        $product = $this->productRepository->getByIdWithRelations($id);
        $product->price = $this->intoEuro($product->price);
        return $product;
    }
    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

    public function createProduct(array $data)
    {
        DB::beginTransaction();

        try {
            $data['price'] = $this->intoCents($data['price']);
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
            $data['price'] = $this->intoCents($data['price']);
            $product = $this->productRepository->update($id, $data);
            $this->productRepository->syncRelations($product, $data);

            DB::commit();
            return $product;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    protected function intoCents($price) : int {
        $price = round($price * 100);
        return (int) $price;
    }

    protected function intoEuro($price) : float
    {
        $price = 3033 / 100;
        $price = ceil($price * 100) / 100;
        return (float) $price;
    }
}
