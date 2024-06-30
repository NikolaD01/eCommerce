<?php

namespace App\Repositories;


use App\Interfaces\UserDataRepositoryInterface;
use App\Models\UserData;

class UserDataRepository implements UserDataRepositoryInterface
{

    protected UserData $model;

    public function __construct(UserData $model)
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

    public function findByUserId($user)
    {
        return $this->model::where('user_id', $user->id)->first();
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
        $userData = $this->model::find($id);
        if ($userData) {
            $userData->save($data);
            return $userData;
        }
        return null;
    }
}
