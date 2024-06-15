<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    protected Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model::all();
    }

    public function getById($id)
    {
        return $this->model::find($id);
    }

    public function delete($id)
    {
        return $this->model::destroy($id);
    }

    public function create(array $data)
    {
        return $this->model->save($data);
    }

    public function update($id, array $data)
    {
        $product = $this->model::find($id);
        if ($product) {
            $product->title = $data['title'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            $product->save();
            return $product;
        }
        return null;
    }
    public function syncRelations($product, array $data)
    {
        if (isset($data['colors'])) {
            $product->colors()->sync($data['colors']);
        }

        if (isset($data['categories'])) {
            $product->categories()->sync($data['categories']);
        }

        if (isset($data['materials'])) {
            $product->materials()->sync($data['materials']);
        }

        if (isset($data['sizes'])) {
            $product->sizes()->sync($data['sizes']);
        }

        return $product;
    }
}
