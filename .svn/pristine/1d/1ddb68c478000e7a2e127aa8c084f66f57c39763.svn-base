<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Common;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TermsandConditionsController extends Controller
{
    use Common;
    public function termsandConditions(){

        try {
            $data = TermsAndConditions::first();
            return view('backend.admin.settings.terms_and_conditions.terms_and_conditions',compact('data'));
        } catch (\Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function termsandConditionsStore(Request $request){
       
        $validator = Validator::make($request->all(), [
            'txtTermsandCondition' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            if ($request->hdTermsId == null) {

                TermsAndConditions::create([
                    'terms_and_conditions' => $request->txtTermsandCondition,
                ]);
                $notification = array(
                    'message' => 'Terms And Conditions Created Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);

            } else {
               
                TermsAndConditions::findOrFail($request->hdTermsId)->update([
                    'terms_and_conditions' => $request->txtTermsandCondition,
                ]);

                $notification = array(
                    'message' => 'Terms And Conditions Updated Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            }
            } catch (\Exception $e) {
                DB::rollback();
                $notification = array(
                    'message' => 'Terms And Conditions Not Updated!',
                    'alert-type' => 'error'
                );
                $this->Log(__FUNCTION__, $request->method(), $e->getMessage(), Auth::user()->id, $request->ip(), gethostname());
                return redirect()->back()->with($notification);
            }
    }
}
