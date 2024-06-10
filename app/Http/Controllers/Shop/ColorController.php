<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    private $colors;

    public function __construct()
    {
        parent::__construct();
        $this->colors = $this->shopData->getAllColors();
    }

    public function index()
    {
        return view('dashboard.shop.colors', ['colors' => $this->colors]);
    }
}
