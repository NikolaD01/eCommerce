<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;

class UserDataController extends Controller
{

    public function index() {
        return view('dashboard.admin.userdata');
    }
}
