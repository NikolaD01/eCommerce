<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\ColorService;

class ColorController extends Controller
{
    private $colorService;

    public function __construct(colorService $colorService)
    {
        $this->colorService = $colorService;
    }

    public function index()
    {
        $colors = $this->colorService->getAllColors();
        return view('dashboard.shop.colors', ['colors' => $colors]);
    }
}
