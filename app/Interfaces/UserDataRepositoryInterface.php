<?php

namespace App\Interfaces;

interface UserDataRepositoryInterface extends BaseRepositoryInterface
{
    public function findByUserId($user);
}
