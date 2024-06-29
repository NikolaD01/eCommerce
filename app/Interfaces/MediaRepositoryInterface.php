<?php

namespace App\Interfaces;

interface MediaRepositoryInterface extends BaseRepositoryInterface
{
    public function paginate($items, $paged);

    public function getByProduct($product);
    public function getByColor($product, $color);

}
