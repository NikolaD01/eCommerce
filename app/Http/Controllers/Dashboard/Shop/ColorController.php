<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\ColorService;

class ColorController extends Controller
{

    public function __construct(
        protected ColorService $colorService
    ){}

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
