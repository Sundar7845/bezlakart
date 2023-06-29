<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcceptedOrderController extends Controller
{
    public function acceptedOrders(){

        return view('backend.admin.orders.acceptedorders');
    }
}
