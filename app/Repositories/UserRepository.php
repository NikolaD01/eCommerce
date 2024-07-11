<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        protected User $model
    ){}

    public function getAll()
    {
        return $this->model::select('id', 'name', 'email', 'role', 'created_at', 'updated_at')->get();
    }

    public function GetAllWithData()
    {
        return $this->model::with('userData')->select('id', 'name', 'email', 'role', 'created_at', 'updated_at')->get();
    }
    public function getById($id)
    {
        return $this->model::select('id', 'name', 'email', 'role', 'created_at', 'updated_at')->find($id);
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->model::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $user = $this->model::find($id);
                if ($user) {
                    $user->userData()->delete();
                    return $user->delete();
                }
                return false;
            });
        } catch (Exception $e) {

            Log::error('Error deleting user: ' . $e->getMessage());
            return false;
        }
    }
}
