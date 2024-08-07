<?php

namespace App\Repositories;


use App\Interfaces\MediaRepositoryInterface;
use App\Models\Media;

class MediaRepository implements MediaRepositoryInterface
{
    public function __construct(
        protected Media $model
    ){}

    public function getAll()
    {
        return $this->model::with('color')->get();
    }

    public function paginate($items, $paged)
    {
        return $this->model::with('color')->paginate($items, ['*'], 'page', $paged);
    }
    public function getById($id)
    {
        return $this->model::with('color')->find($id);
    }

    public function getByProduct($product)
    {
        return $this->model::whereHas('products', function ($query) use ($product) {
            $query->where('product_id', $product);
        })->get();
    }
    public function getByColor($product, $color)
    {
        return $this->model::whereHas('products', function ($query) use ($product) {
            $query->where('product_id', $product);
        })->where('color_id', $color)->get();    }

    public function delete($id)
    {
        return $this->model::destroy($id);
    }

    public function create(array $data)
    {
        if (isset($data['path'])) {
        $filePath = $data['path'];
        $existingFile = $this->model::where('path', $filePath)->first();
        if ($existingFile) {
            return ['message' => 'File already exists'];
        }
    }
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        $color = $this->model::find($id);
        if ($color) {
            $color->save($data);
            return $color;
        }
        return null;
    }
}
