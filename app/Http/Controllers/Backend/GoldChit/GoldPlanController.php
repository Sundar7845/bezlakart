<?php

namespace App\Http\Controllers\Backend\GoldChit;

use App\Http\Controllers\Controller;
use App\Models\GoldPlan;
use App\Models\PlanType;
use App\Traits\Common;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoldPlanController extends Controller
{
    use Common;

    function goldPlan()
    {
        $planType = PlanType::get();
        return view('backend.admin.goldchit.goldplan', compact('planType'));
    }

    function  goldPlanCreate(Request $request)
    {
        $request->validate([
            'txtPlanName' => 'required',
            'ddlPlanType' => 'required',
            'txtGoldType' => 'required',
            'txtGoldWeight' => 'required',
            'txtPlanInstallment' => 'required',
            'txtPlanAmount' => 'required',
            'txtTotalPlanAmount' => 'required',
        ], [
            'txtPlanName.required' => 'The Plan Name is required',
            'ddlPlanType.required' => 'The Plan Type is required',
            'txtGoldType.required' => 'The Gold Type is required',
            'txtGoldWeight.required' => 'The Gold Weight is required',
            'txtPlanInstallment.required' => 'The Plan Installment is required',
            'txtPlanAmount.required' => 'The Plan Amount is required',
            'txtTotalPlanAmount.required' => 'The Total Plan Amount is required',
        ]);
        DB::beginTransaction();
        try {
            if ($request->hdGoldPlanId == null) {
                GoldPlan::Create([
                    'plan_name' => $request->txtPlanName,
                    'plan_type_id' => $request->ddlPlanType,
                    'gold_type' => $request->txtGoldType,
                    'gold_weight' => $request->txtGoldWeight,
                    'plan_installment' => $request->txtPlanInstallment,
                    'plan_amount' => $request->txtPlanAmount,
                    'total_plan_amount' => $request->txtTotalPlanAmount,
                    'created_by' => Auth::user()->id
                ]);

                DB::commit();
                $notification = array(
                    'message' => 'Gold Plan Created successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                GoldPlan::findorfail($request->hdGoldPlanId)->update([
                    'plan_name' => $request->txtPlanName,
                    'plan_type_id' => $request->ddlPlanType,
                    'gold_type' => $request->txtGoldType,
                    'gold_weight' => $request->txtGoldWeight,
                    'plan_installment' => $request->txtPlanInstallment,
                    'plan_amount' => $request->txtPlanAmount,
                    'total_plan_amount' => $request->txtTotalPlanAmount,
                    'updated_by' => Auth::user()->id
                ]);

                DB::commit();
                $notification = array(
                    'message' => 'Gold Plan Updated successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            $this->Log(__FUNCTION__, "POST", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
            return redirect()->back()->with($notification);
        }
    }

    public function getGoldPlans()
    {
        $goldPlan = GoldPlan::select('gold_plans.*', 'plan_types.plan_type')
            ->join('plan_types', 'plan_types.id', 'gold_plans.plan_type_id')
            ->whereNull('gold_plans.deleted_at')
            ->get();
        return datatables()->of($goldPlan)
            ->addColumn('action', function ($row) {
                $html = "";
                $html = '<i class="text-primary ri-pencil-line"
                onclick="doEdit(' . $row->id . ');"></i> ';
                $html .= '<i class="text-danger ri-delete-bin-6-line" id="confrim-color(' . $row->id . ')" onclick="showDelete(' . $row->id . ');"></i>';
                return $html;
            })->toJson();
    }

    function getGoldPlanById($id)
    {
        try {
            $goldplan = GoldPlan::where('id', $id)->first();
            return response()->json([
                'goldplan' => $goldplan
            ]);
        } catch (\Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function deleteGoldPlan($id)
    {
        DB::beginTransaction();
        try {
            $module = GoldPlan::findorfail($id);
            $module->delete();
            $module->update([
                'deleted_by' => Auth::user()->id
            ]);

            $notification = array(
                'message' => 'Gold Plan Deleted Successfully',
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
                'message' => 'Gold Plan could not be deleted',
                'alert' => 'error'
            );
            return response()->json([
                'responseData' => $notification
            ]);
        }
    }

    public function goldPlanActiveStatus($id, $status)
    {
        try {
            GoldPlan::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}
