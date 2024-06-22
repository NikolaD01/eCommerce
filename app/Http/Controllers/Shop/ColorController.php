<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\ColorService;

class ColorController extends Controller
{
    private $colorService;

    public function __construct()
    {
        $this->colorService = app(ColorService::class);
    }

    public function destroy($color)
    {
            $this->colorService->deleteColor($color);
            return redirect()->back()->with('message', 'Color deleted successfully');
    }
    public function index()
    {
        $colors = $this->colorService->getAllColors();
        return view('dashboard.shop.colors', ['colors' => $colors]);
    }
}
