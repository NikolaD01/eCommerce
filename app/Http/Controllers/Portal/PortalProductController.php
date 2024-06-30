<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortalProductController extends Controller
{

    public function show($id)
    {
        return view('portal.pages.products.single', compact('id'));
    }

    public function index()
    {
        return view('portal.pages.products.index');
    }
}
