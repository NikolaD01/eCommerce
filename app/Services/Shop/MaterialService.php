<?php

namespace App\Services\Shop;

use App\Interfaces\BaseRepositoryInterface;

class MaterialService
{

    public function __construct(
        protected BaseRepositoryInterface $materialRepository
    ){}

    public function getAllMaterials()
    {
        return $this->materialRepository->getAll();
    }

    public function getMaterial($id)
    {
        return $this->materialRepository->getById($id);
    }

    public function deleteMaterial($id)
    {
        return $this->materialRepository->delete($id);
    }

    public function createMaterial(array $data)
    {
        return $this->materialRepository->create($data);
    }

    public function updateMaterial($id, array $data)
    {
        return $this->materialRepository->update($id, $data);
    }
}
