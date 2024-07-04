<?php

namespace App\Repositories;


use App\Interfaces\BaseRepositoryInterface;
use App\Models\Color;

class ColorRepository implements BaseRepositoryInterface
{


    public function __construct(
        protected Color $model
    ){}

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
