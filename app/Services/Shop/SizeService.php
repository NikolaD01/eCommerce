<?php

namespace App\Services\Shop;

use App\Interfaces\BaseRepositoryInterface;

class SizeService
{

    public function __construct(
        protected BaseRepositoryInterface $sizeRepository
    ){}

    public function getAllSizes()
    {
        return $this->sizeRepository->getAll();
    }

    public function getSize($id)
    {
        return $this->sizeRepository->getById($id);
    }

    public function deleteSize($id)
    {
        return $this->sizeRepository->delete($id);
    }

    public function createSize(array $data)
    {
        return $this->sizeRepository->create($data);
    }

    public function updateSize($id, array $data)
    {
        return $this->sizeRepository->update($id, $data);
    }
}
