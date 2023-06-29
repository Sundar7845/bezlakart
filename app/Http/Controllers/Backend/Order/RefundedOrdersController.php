<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefundedOrdersController extends Controller
{
    public function refundedOrders(){

        return view('backend.admin.orders.refundedorders');
    }
}
