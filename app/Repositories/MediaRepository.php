<?php

namespace App\Repositories;


use App\Interfaces\MediaRepositoryInterface;
use App\Models\Media;

class MediaRepository implements MediaRepositoryInterface
{

    protected Media $model;

    public function __construct(Media $model)
    {
        $this->model = $model;
    }

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
