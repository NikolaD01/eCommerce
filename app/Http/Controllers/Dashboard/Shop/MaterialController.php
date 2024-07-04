<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Services\Shop\MaterialService;

class MaterialController extends Controller
{
    public function __construct(
        protected MaterialService $materialService
    ){}

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
