<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponType;
use App\Models\DiscountType;
use App\Models\Store;
use App\Models\SystemModules;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    function coupon()
    {
        $systemModules = SystemModules::get();
        $store = Store::where('is_active', 1)->whereNull('deleted_at')->get();
        $coupon = CouponType::get();
        $discountType = DiscountType::get();
        return view('backend.admin.master.coupon.coupon', compact('systemModules', 'store', 'coupon', 'discountType'));
    }

    function couponCreate(Request $request)
    {
        $request->validate([
            'txtCouponName' => [
                'required',
                Rule::unique('coupons', 'coupon_name')->whereNull('deleted_at')->ignore($request->hdCouponId)
            ],
            'ddlSystemModuleName' => 'required',
            'ddlCouponTypeName' => 'required',
            'ddlStoreName' => 'required',
            'txtCouponCode' => 'required',
            'txtLimitForSameUser' => 'required',
            'ddlStartDate' => 'required',
            'ddlEndDate' => 'required|after:ddlStartDate',
            'ddlDiscountType' => 'required',
            'txtDiscount' => 'required',
            'txtMaxDiscount' => 'required',
            'txtMinPurchase' => 'required'
        ], [
            'txtCouponName.required' => 'Coupon Name is required',
            'txtCouponName.unique' => 'Coupon Name is already Exist',
            'ddlSystemModuleName.required' => 'System Module is required',
            'ddlCouponTypeName.required' => 'Coupon Type Name is required',
            'ddlStoreName.required' => 'Store Name is required',
            'txtLimitForSameUser.required' => 'Limit For Same User Name is required',
            'ddlStartDate.required' => 'Start Date is required',
            'ddlEndDate.required' => 'End Date is required',
            'ddlEndDate.after' => 'End Date Should after start date',
            'ddlDiscountType.required' => 'Discount Type is required',
            'txtDiscount.required' => 'Discount is required',
            'txtMaxDiscount.required' => 'Max Discount is required',
            'txtMinPurchase.required' => 'Min Purchase is required',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hdCouponId == null) {
                Coupon::Create([
                    'store_id' => $request->ddlStoreName,
                    'system_module_id' => $request->ddlSystemModuleName,
                    'coupon_name' => $request->txtCouponName,
                    'coupon_code' => $request->txtCouponCode,
                    'start_date'  => $request->ddlStartDate,
                    'end_date'    => $request->ddlEndDate,
                    'discount_type_id' => $request->ddlDiscountType,
                    'discount_value' => $request->txtDiscount,
                    'coupon_type_id' => $request->ddlCouponTypeName,
                    'same_user_limit' => $request->txtLimitForSameUser,
                    'min_purchase' => $request->txtMinPurchase,
                    'max_discount' => $request->txtMaxDiscount,
                    'created_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Coupon Created Successfully',
                    'alert-type' => 'success'
                );

                DB::commit();
                return redirect()->route('coupon')->with($notification);
            } else {
                Coupon::findorfail($request->hdCouponId)->update([
                    'store_id' => $request->ddlStoreName,
                    'system_module_id' => $request->ddlSystemModuleName,
                    'coupon_name' => $request->txtCouponName,
                    'coupon_code' => $request->txtCouponCode,
                    'start_date'  => $request->ddlStartDate,
                    'end_date'    => $request->ddlEndDate,
                    'discount_type_id' => $request->ddlDiscountType,
                    'discount_value' => $request->txtDiscount,
                    'coupon_type_id' => $request->ddlCouponTypeName,
                    'same_user_limit' => $request->txtLimitForSameUser,
                    'min_purchase' => $request->txtMinPurchase,
                    'max_discount' => $request->txtMaxDiscount,
                    'updated_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Coupon Updated Successfully',
                    'alert-type' => 'success'
                );

                DB::commit();
                return redirect()->route('coupon')->with($notification);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->Log(__FUNCTION__, "POST", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );

            return redirect()->route('coupon')->with($notification);
        }
    }

    function couponData()
    {
        try {
            $coupon = Coupon::select('coupons.*', 'system_modules.module_name', 'coupon_types.coupon_type')
                ->join('system_modules', 'system_modules.id', 'coupons.system_module_id')
                ->join('coupon_types', 'coupon_types.id', 'coupons.coupon_type_id')
                ->orderBy('coupons.id', 'ASC')
                ->get();
            return datatables()->of($coupon)
                ->addColumn('action', function ($row) {
                    $html = "";
                    $html = '<i class="text-primary ri-pencil-line"
                    onclick="doEdit(' . $row->id . ');"></i> ';
                    $html .= '<i class="text-danger ri-delete-bin-6-line" id="confrim-color(' . $row->id . ')" onclick="showDelete(' . $row->id . ');"></i>';
                    return $html;
                })->toJson();
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    function getCouponById($id)
    {
        try {
            $coupon = Coupon::where('id', $id)->first();
            return response()->json([
                'coupon' => $coupon
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    function deleteCoupon($id)
    {
        DB::beginTransaction();
        try {
            $coupon = Coupon::findorfail($id);
            $coupon->delete();
            $coupon->update([
                'deleted_by' => Auth::user()->id
            ]);

            $notification = array(
                'message' => 'Coupon Deleted Successfully',
                'alert' => 'success'
            );

            DB::commit();
            return response()->json([
                'responseData' => $notification
            ]);
        } catch (Exception $e) {
            DB::rollback();
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
            $notification = array(
                'message' => 'Coupon could not be deleted',
                'alert' => 'error'
            );
            return response()->json([
                'responseData' => $notification
            ]);
        }
    }

    public function couponActiveStatus($id, $status)
    {
        try {
            Coupon::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}
