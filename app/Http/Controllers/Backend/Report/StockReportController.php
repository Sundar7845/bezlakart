<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    public function stockReport(){

        return view('backend.admin.report.stockreport');
    }
}
