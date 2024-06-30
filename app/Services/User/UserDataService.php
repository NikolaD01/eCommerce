<?php

namespace App\Services\User;

use App\Interfaces\UserDataRepositoryInterface;
use Illuminate\Support\Facades\File;

class UserDataService
{
    protected UserDataRepositoryInterface $colorRepository;

    public function __construct(UserDataRepositoryInterface $userDataRepository)
    {
        $this->userDataRepository = $userDataRepository;
    }

    public function getAllUserData()
    {
        return $this->userDataRepository->getAll();
    }

    public function getUserData($id)
    {
        return $this->userDataRepository->getById($id);
    }

    public function deleteUserData($id)
    {
        return $this->userDataRepository->delete($id);
    }

    public function createUserData(array $data)
    {
        return $this->userDataRepository->create($data);
    }

    public function updateUserData($id, array $data)
    {
        return $this->userDataRepository->update($id, $data);
    }
}
