<?php

namespace App\Http\Controllers\Frontend\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    use Common;
    public function forgotPassword()
    {

        return view('frontend.auth.forgotpassword');
    }

    public function forgetPasswordStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'txtForgotemail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->txtForgotemail,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $businessSettings = $this->BussinessSettingdetails();
        User::where('email', $request->txtForgotemail)->update([
            'email_expiry' => now()->addMinutes($businessSettings->email_expiry_duration)
        ]);
        Mail::send('frontend.auth.forgotpassword_email', ['token' => $token, 'email' => $request->txtForgotemail], function ($message) use ($request) {
            $message->to($request->txtForgotemail);
            // $message->from($businessSettings->company_email, env('APP_NAME'));
            $message->from($this->BussinessSettingdetails()->company_email, $this->BussinessSettingdetails()->company_name);
            $message->subject('Reset Password');
        });

        $notification = array(
            'message' => 'We have emailed your password reset link!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function resetPassword($token, $email)
    {
        $expiry = User::where('email', $email)->value('email_expiry');
        $status = Carbon::now() >= $expiry ? 'Your email is expired!' : 'Success';
        if ($status == 'Success') {
            return view('frontend.auth.newpasswordadd', ['token' => $token]);
        } else {
            $notification = array(
                'message' => 'Your Reset Password Email Links Has been expired!',
                'alert-type' => 'error'
            );
            return redirect()->route('forgotpassword')->with($notification);
        }
    }

    public function resetPasswordStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'txtResetemail' => 'required',
            'txtNewpassword' => 'required',
            'txtNewconfirmpassword' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $update = DB::table('password_resets')->where(['email' => $request->txtResetemail, 'token' => $request->token])->first();

        if (!$update) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->txtResetemail)->update(['password' => Hash::make($request->txtNewpassword)]);

        // Delete password_resets record
        DB::table('password_resets')->where(['email' => $request->txtResetemail])->delete();

        return redirect()->route('loginform')->with('message', 'Your password has been successfully changed!');
    }
}
