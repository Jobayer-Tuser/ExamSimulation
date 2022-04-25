<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::with(['customer', 'product'])->get();
        return view('admin.order.index') ;
    }
}
