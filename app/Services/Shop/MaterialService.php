<?php

namespace App\Services\Shop;

use App\Interfaces\BaseRepositoryInterface;

class MaterialService
{
    protected BaseRepositoryInterface $materialRepository;

    public function __construct(BaseRepositoryInterface $materialRepository)
    {
        $this->materialRepository = $materialRepository;
    }

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
