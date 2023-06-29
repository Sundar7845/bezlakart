<?php

namespace App\Http\Controllers\Frontend\Register;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use Common;
    public function register()
    {
        $businesssettings = $this->BussinessSettingdetails();
        return view('frontend.auth.register', compact('businesssettings'));
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtUsername' => 'required',
            'txtEmail' => [
                'required',
                Rule::unique('users', 'email')
            ],
            'txtMobile' => [
                'required',
                Rule::unique('users', 'mobile')
            ],
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        User::Create([
            'user_name' => $request->txtUsername,
            'email' => $request->txtEmail,
            'mobile' => $request->txtMobile,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]);

        $notification = array(
            'message' => 'Registered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('myaccount')->with($notification);
    }
}
