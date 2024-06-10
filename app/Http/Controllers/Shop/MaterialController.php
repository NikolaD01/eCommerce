<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    private $materials;
    public function __construct()
    {
        parent::__construct();
        $this->materials = $this->shopData->getAllMaterials();
    }

    public function index()
    {
        return view('dashboard.shop.materials', ['materials' => $this->materials]);
    }
}
