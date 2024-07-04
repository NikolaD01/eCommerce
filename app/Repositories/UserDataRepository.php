<?php

namespace App\Repositories;


use App\Interfaces\UserDataRepositoryInterface;
use App\Models\UserData;

class UserDataRepository implements UserDataRepositoryInterface
{
    public function __construct(
        protected UserData $model
    ){}

    public function getAll()
    {
        return $this->model::with(['user' => function($query) {
            $query->select('id', 'name', 'email', 'role', 'created_at', 'updated_at');
        }])->get();
    }

    public function getById($id)
    {
        return $this->model::with(['user' => function($query) {
            $query->select('id', 'name', 'email', 'role', 'created_at', 'updated_at');
        }])->find($id);
    }

    public function findByUserId($user)
    {
        return $this->model::with(['user' => function($query) {
            $query->select('id', 'name', 'email', 'role', 'created_at', 'updated_at');
        }])->where('user_id', $user)->first();
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
            $userData->city = $data['city'];
            $userData->region = $data['region'];
            $userData->address = $data['address'];
            $userData->post_code = $data['post_code'];
            $userData->phone_number = $data['phone_number'];
            $userData->save($data);
            return $userData;
        }
        return null;
    }
}
