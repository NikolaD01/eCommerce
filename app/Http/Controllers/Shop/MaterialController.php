<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\MaterialService;

class MaterialController extends Controller
{
    private $materials;
    private MaterialService $materialService;
    public function __construct()
    {
        $this->materialService = app(MaterialService::class);
        $this->materials = $this->materialService->getAllMaterials();
    }

    public function destroy($id)
    {
        $this->materialService->deleteMaterial($id);
        return redirect()->back();
    }
    public function index()
    {
        return view('dashboard.shop.materials', ['materials' => $this->materials]);
    }
}
