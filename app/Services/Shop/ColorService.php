<?php

namespace App\Services\Shop;

use App\Interfaces\BaseRepositoryInterface;

class ColorService
{
    protected BaseRepositoryInterface $colorRepository;

    public function __construct(BaseRepositoryInterface $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function getAllColors()
    {
        return $this->colorRepository->getAll();
    }

    public function getColor($id)
    {
        return $this->colorRepository->getById($id);
    }

    public function deleteColor($id)
    {
        return $this->colorRepository->delete($id);
    }

    public function createColor(array $data)
    {
        return $this->colorRepository->create($data);
    }

    public function updateColor($id, array $data)
    {
        return $this->colorRepository->update($id, $data);
    }
}
