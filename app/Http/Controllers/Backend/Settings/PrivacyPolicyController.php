<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\PrivacyAndPolicy;
use App\Traits\Common;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class PrivacyPolicyController extends Controller
{
    use Common;
    public function privacyPolicy()
    {
        try {
            $privacy_and_policy = PrivacyAndPolicy::first();
            return view('backend.admin.settings.privacy_and_policy.privacy_and_policy', compact('privacy_and_policy'));
        } catch (\Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function privacyPolicyStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'txtPrivacyandPolicy' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            if ($request->hdPrivacyId == null) {

                PrivacyAndPolicy::Create([
                    'privacy_and_policy' => $request->txtPrivacyandPolicy
                ]);
                $notification = array(
                    'message' => 'Privacy And Policy Created Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            } else {

                PrivacyAndPolicy::findOrFail($request->hdPrivacyId)->update([
                    'privacy_and_policy' => $request->txtPrivacyandPolicy
                ]);

                $notification = array(
                    'message' => 'Privacy And Policy Updated Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            }
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Privacy And Policy Not Updated!',
                'alert-type' => 'error'
            );
            $this->Log(__FUNCTION__, $request->method(), $e->getMessage(), Auth::user()->id, $request->ip(), gethostname());
            return redirect()->back()->with($notification);
        }
    }
}
