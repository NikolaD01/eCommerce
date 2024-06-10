<?php

namespace App\Http\Controllers;
use App\Services\Shop\ShopData;

abstract class Controller
{
    protected $shopData;

    public function __construct()
    {
        $this->shopData = new ShopData();
    }
    //
}
