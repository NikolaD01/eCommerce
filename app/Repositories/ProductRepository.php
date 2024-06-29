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

    public function getByIdWithRelations($id)
    {
        return $this->model::with('colors', 'sizes', 'materials', 'categories','medias')->find($id);
    }

    public function delete($id)
    {
        $product = $this->getByIdWithRelations($id);

        if ($product) {
            $product->colors()->detach();
            $product->sizes()->detach();
            $product->materials()->detach();
            $product->categories()->detach();
            $product->medias()->detach();
        }
        return $product->delete();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
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

        if(isset($data['medias'])) {
            $product->medias()->sync($data['medias']);
        }

        return $product;
    }
}
