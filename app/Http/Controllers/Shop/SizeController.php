<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\SizeService;

class SizeController extends Controller
{
    private $sizeService;

    public function __construct(SizeService $sizeService)
    {
        $this->sizeService = $sizeService;
    }

    public function index()
    {
            return view('dashboard.shop.sizes', ['sizes' => $this->sizeService->getAllSizes()]);
    }
}
