<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\MaterialService;

class MaterialController extends Controller
{
    private $materials;
    private $materialService;
    public function __construct(MaterialService $materialService)
    {
        $this->materialService = $materialService;
        $this->materials = $this->materialService->getAllMaterials();
    }

    public function index()
    {
        return view('dashboard.shop.materials', ['materials' => $this->materials]);
    }
}
