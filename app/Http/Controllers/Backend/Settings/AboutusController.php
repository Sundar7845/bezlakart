<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Common;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AboutusController extends Controller
{
    use Common;
    public function aboutUs()
    {
        try {
            $aboutus = AboutUs::first();
            return view('backend.admin.settings.about_us.about_us', compact('aboutus'));
        } catch (\Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function aboutUsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtAdminaboutus' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            if ($request->hdAboutId == null) {

                AboutUs::create([
                    'about_us' => $request->txtAdminaboutus,
                ]);
                $notification = array(
                    'message' => 'About Us Created Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            } else {

                AboutUs::findOrFail($request->hdAboutId)->update([
                    'about_us' => $request->txtAdminaboutus,
                ]);

                $notification = array(
                    'message' => 'About Us Updated Successfully!',
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
