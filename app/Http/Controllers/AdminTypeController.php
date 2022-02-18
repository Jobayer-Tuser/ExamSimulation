<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
    public function index()
    {
        return view('admin.admintype.index');
    }
}
