<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\SizeService;

class SizeController extends Controller
{
    private sizeService $sizeService;

    public function __construct()
    {
        $this->sizeService = app(sizeService::class);
    }

    public function destroy($size)
    {
        $this->sizeService->deleteSize($size);
        return redirect()->back()->with('message', 'Size delete successfully');
    }
    public function index()
    {
            return view('dashboard.shop.sizes', ['sizes' => $this->sizeService->getAllSizes()]);
    }
}
