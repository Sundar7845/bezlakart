<?php

namespace App\Http\Controllers\Backend\Master;

use App\Enums\RolesType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use Common;

    function customer()
    {
        return view('backend.admin.customer.customerlist');
    }

    function getCustomerData()
    {
        $customerlist = User::where('role_id', RolesType::Customer)->get();
        return datatables()->of($customerlist)
            ->addColumn('action', function ($row) {
                $html = "";
                $html = '<i class="text-primary ri-pencil-line"
                onclick="doEdit(' . $row->id . ');"></i> ';
                $html .= '<i class="text-danger ri-delete-bin-6-line" id="confrim-color(' . $row->id . ')" onclick="showDelete(' . $row->id . ');"></i>';
                return $html;
            })->toJson();
    }
}
