<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\ThirdPartyApiSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThirdPartyApisController extends Controller
{
    public function thirdPartyApi()
    {
        try {
            $thirdpartyapisetting = ThirdPartyApiSetting::first();
            return view('backend.admin.settings.third_party_apis.third_party_apis', compact('thirdpartyapisetting'));
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function thirdPartyApiStore(Request $request)
    {
        $request->validate([
            'txtMapApiKeyClient' => 'required',
            'txtMapApiKeyServer' => 'required'
        ], [
            'txtMapApiKeyClient.required' => 'The Map Api Key Client is required',
            'txtMapApiKeyServer.required' => 'The Map Api Key Server is required'
        ]);
        DB::beginTransaction();
        try {
            if ($request->hdThirdPartySettingId == null) {

                ThirdPartyApiSetting::create([
                    'map_api_key_client' => $request->txtMapApiKeyClient,
                    'map_api_key_server' => $request->txtMapApiKeyServer,
                    'created_by'         => Auth::user()->id
                ]);
                $notification = array(
                    'message' => 'Third Party Api Settings Created Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            } else {

                ThirdPartyApiSetting::findOrFail($request->hdThirdPartySettingId)->update([
                    'map_api_key_client' => $request->txtMapApiKeyClient,
                    'map_api_key_server' => $request->txtMapApiKeyServer,
                    'updated_by'         => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Third Party Api Settings Updated Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            }
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            $this->Log(__FUNCTION__, $request->method(), $e->getMessage(), Auth::user()->id, $request->ip(), gethostname());
            return redirect()->back()->with($notification);
        }
    }
}
