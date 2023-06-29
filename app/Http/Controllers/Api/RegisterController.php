<?php

namespace App\Http\Controllers\Api;

use App\Enums\RolesType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Common;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use Common;
    use ResponseAPI;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')
            ],
            'mobile' => [
                'required',
                Rule::unique('users', 'mobile')
            ],
            // 'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => implode(",", $validator->errors()->all())], 200);
        }
        DB::beginTransaction();
        try {
            $user = User::Create([
                'user_name' => $request->username,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'role_id' => RolesType::Customer,
                'social_id' => $request->social_id
            ]);
            DB::commit();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Registered Successfully',
                    'mobile' => $request->mobile,
                    'user_id' => $user->id,
                    'social_id' => $request->social_id
                ],
                200
            );
        } catch (Exception $e) {
            DB::rollBack();
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
