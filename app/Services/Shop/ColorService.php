<?php

namespace App\Services\Shop;

use App\Interfaces\BaseRepositoryInterface;

use Illuminate\Support\Facades\File;

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
        $created = $this->colorRepository->create($data);
        if($created)
        {
            $colors = $this->getAllColors()->pluck('class')->toArray();
            File::put(storage_path('colors.json'), json_encode($colors));
            exec('npm run build-tailwind');
            return $created;
        }
        return false;
    }

    public function updateColor($id, array $data)
    {
        return $this->colorRepository->update($id, $data);
    }
}
