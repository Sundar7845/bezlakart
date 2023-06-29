<?php

namespace App\Http\Controllers\Api;

use App\Enums\RolesType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Common;
use App\Traits\ResponseAPI;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use Common;
    use ResponseAPI;

    function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile'   => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => implode(",", $validator->errors()->all())], 200);
        }
        try {

            $useremail = User::where('email', $request->mobile)->orwhere('mobile', $request->mobile)->pluck('email')->first();
            $usermobile = User::where('email', $request->mobile)->orwhere('mobile', $request->mobile)->pluck('mobile')->first();

            $verifyRole = $this->getRoleId($useremail);
            if ($verifyRole  == RolesType::Customer) {
                $data = [
                    'email' => $useremail,
                    'password' => $request->password,
                    'mobile' => $usermobile,
                ];
                if (Auth::attempt($data)) {
                    $token = Auth::user()->createToken('bezlakart')->accessToken;
                    $user_id = Auth::user()->id;
                    $user_name = Auth::user()->user_name;
                    $userrole_id = Auth::user()->role_id;

                    $responseData['status'] = true;
                    $responseData['message'] = 'Logged in Successfully';
                    $userCollection = array(
                        "id" => $user_id,
                        "name" => $user_name,
                        "role_id" => $userrole_id,
                        "mobile" => $usermobile,
                        "email" => $useremail,
                        "token" => $token
                    );
                    $responseData['data'] = $userCollection;
                    return response()->json($responseData, 200);
                } else {
                    return response()->json(['status' => false, 'message' => 'Invalid Credentials'], 200);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Invalid Credentials'], 200);
            }
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    function sendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile'   => 'required|min:10'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => implode(",", $validator->errors()->all())], 200);
        }
        try {
            $otplength = $this->BussinessSettingdetails();
            $otp = $this->generateRandom($otplength->otp_length);
            User::where('mobile', $request->mobile)->update([
                'OTP' => $otp,
                'otp_expiry' => now()->addMinutes($otplength->otp_expiry_duration)
            ]);
            return response()->json(['status' => true, 'message' => 'OTP Sent Successfully'], 200);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp'   => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => implode(",", $validator->errors()->all())], 200);
        }
        try {
            // Check email
            $user = User::where('id', $request->user_id)->where('is_active', 1)->first();

            $message = ($user->otp != $request->otp ? 'Incorrect OTP!' : (Carbon::now() >= $user->otp_expiry ? 'Your otp is expired!' : 'Success'));
            $status = ($message ==  'Success');
            if ($status) {
                User::findOrfail($user->id)
                    ->update(['mobile_verified_at' => now(), 'last_login' => now()]);
                $response = [
                    'status' => $status,
                    'message' => $message,
                    'user' => $user,
                ];
            } else {
                $response = [
                    'status' => $status,
                    'message' => $message
                ];
            }
            return response($response, 200);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), 200);
        }
    }

    function logout()
    {
        try {
            $user = Auth::user();
            if ($user) {
                $user->token()->revoke();
                return response()->json([
                    'status' => true,
                    'message' => 'Logged out successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'User does not exist. Please sign up.'
                ], 200);
            }
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
