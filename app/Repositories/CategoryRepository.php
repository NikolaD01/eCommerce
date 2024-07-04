<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Category;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class CategoryRepository implements BaseRepositoryInterface
{

    public function __construct(
        protected Category $model
    ){}

    public function getAll() : Collection
    {
        try {
            return $this->model::all();
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function getById($id): ?Category
    {
        try {
            return $this->model::find($id);
        } catch (ModelNotFoundException | QueryException $e) {
            throw $e;
        }
    }

    public function delete($id) : int
    {
        try {
            return $this->model::destroy($id);
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function create(array $data) : Category
    {
        try {
            return $this->model::create($data);
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function update($id, array $data): ?Category
    {
        try {
            $category = $this->model::find($id);
            if ($category) {
                $category->update($data);
                return $category;
            }
            return null;
        } catch (ModelNotFoundException | QueryException $e) {
            throw $e;
        }
    }
}
