<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllOrderController extends Controller
{
    public function allOrders(){

        return view('backend.admin.orders.allorders');
    }
}
