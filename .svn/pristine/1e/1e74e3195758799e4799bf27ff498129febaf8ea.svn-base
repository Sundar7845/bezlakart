<?php

namespace App\Http\Controllers\Backend\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StoreRegisterController extends Controller
{
    public function storeRegister(){

        return view('backend.admin.login.storeregister');
    }

    public function storeRegisterStore(Request $request){

        $validator = Validator::make($request->all(),[
            'txtname' => 'required',
            'txtshopname' => 'required',
            'txtemail' => [
                'required',
                Rule::unique('users', 'email')
            ],
            'txtphone' => [
                'required',
                Rule::unique('users', 'mobile')
            ],
            'txtpassword' => 'required',
            'password_confirmation' => 'required',
            'txtbank_name' => 'required',
            'txtholdername' => 'required',
            'txtaccountnumber' => 'required',
            'txtifsccode' => 'required'
           
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        User::Create([
            'user_name' => $request->txtname,
            'email' => $request->txtemail,
            'mobile' => $request->txtphone,
            'password' => Hash::make($request->txtpassword),
            'role_id' => 4,
        ]);

        Vendor::Create([
            'user_name' => $request->txtname,
            'shop_name' => $request->txtshopname,
            'mobile' => $request->txtphone,
            'email' => $request->txtemail,
            'bank_name' => $request->txtbank_name,
            'account_holder_name' => $request->txtholdername,
            'account_number' => $request->txtaccountnumber,
            'ifsc_code' => $request->txtifsccode,
        ]); 

        $notification = array(
            'message' => 'Registered Successfully',
            'alert-type' => 'success'
        ); 

        return redirect()->route('admin.dashboard')->with($notification);
    }
}
