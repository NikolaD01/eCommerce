<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\MaterialService;

class MaterialController extends Controller
{
    private MaterialService $materialService;
    public function __construct()
    {
        $this->materialService = app(MaterialService::class);
    }

    public function destroy($id)
    {
        $this->materialService->deleteMaterial($id);
        return redirect()->back();
    }
    public function index()
    {
        $materials = $this->materialService->getAllMaterials();
        return view('dashboard.shop.materials', ['materials' => $materials]);
    }
}
