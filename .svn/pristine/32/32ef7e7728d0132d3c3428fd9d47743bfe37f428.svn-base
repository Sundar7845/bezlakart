<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\Common;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use Common;
    use ResponseAPI;

    function configs()
    {
        try {
            $configs = $this->BussinessSettingdetails();

            $data = [
                'config_id' => $configs->id,
                'is_maintenance_mode' => $configs->is_maintenance_mode,
                'otp_login' => $configs->otp_login,
                'google_signup' => $configs->google_signup,
                'facebook_signup' => $configs->facebook_signup,
                'store_self_registration' => $configs->store_self_registration,
                'currency_symbol' => $configs->currency_symbol,
                'app_logo' => url($configs->app_logo),
                'gold_module' => $configs->gold_module,
                'ecommerce' => $configs->ecommerce
            ];

            return response()->json(['data' => $data], 200);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
