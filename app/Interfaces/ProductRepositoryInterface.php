<?php

namespace App\Interfaces;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    // TODO: Add more funcionalites if needed
    public function syncRelations($product, array $data);

    public function getByIdWithRelations($id);

    public function getAllWithRelations();

}
