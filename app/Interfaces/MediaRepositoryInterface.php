<?php

namespace App\Interfaces;

interface MediaRepositoryInterface extends BaseRepositoryInterface
{
    public function paginate($items, $paged);

}
