<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Traits\Common;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    use Common;

    function attribute()
    {
        return view('backend.admin.master.attribute.attribute');
    }

    function attributeCreate(Request $request)
    {
        $request->validate([
            'txtAttributeName' => 'required'
        ], [
            'txtAttributeName.required' => 'Attribute Name is required'
        ]);

        DB::beginTransaction();
        try {
            if ($request->hdAttributeId == null) {

                Attribute::Create([
                    'attribute_name' => $request->txtAttributeName,
                    'created_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Attribute Created Successfully',
                    'alert-type' => 'success'
                );

                DB::commit();
                return redirect()->route('attribute')->with($notification);
            } else {

                Attribute::findorFail($request->hdAttributeId)->update([
                    'attribute_name' => $request->txtAttributeName,
                    'updated_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Attribute Updated Successfully',
                    'alert-type' => 'success'
                );

                DB::commit();
                return redirect()->route('attribute')->with($notification);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->Log(__FUNCTION__, "POST", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );

            return redirect()->route('attribute')->with($notification);
        }
    }

    public function getAttributeData()
    {
        $attribute = Attribute::whereNull('deleted_at')->orderBy('id', 'ASC')->get();
        return datatables()->of($attribute)
            ->addColumn('action', function ($row) {
                $html = "";
                $html = '<i class="text-primary ri-pencil-line"
                onclick="doEdit(' . $row->id . ');"></i> ';
                $html .= '<i class="text-danger ri-delete-bin-6-line" id="confrim-color(' . $row->id . ')" onclick="showDelete(' . $row->id . ');"></i>';
                return $html;
            })->toJson();
    }

    function getAttributeById($id)
    {
        try {
            $attribute = Attribute::where('id', $id)->first();
            return response()->json([
                'attribute' => $attribute
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    function deleteAttribute($id)
    {
        DB::beginTransaction();
        try {
            $brand = Attribute::findorfail($id);
            $brand->delete();
            $brand->update([
                'deleted_by' => Auth::user()->id
            ]);

            $notification = array(
                'message' => 'Attribute Deleted Successfully',
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
                'message' => 'Attribute could not be deleted',
                'alert' => 'error'
            );
            return response()->json([
                'responseData' => $notification
            ]);
        }
    }

    public function attributeActiveStatus($id, $status)
    {
        try {
            Attribute::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}
