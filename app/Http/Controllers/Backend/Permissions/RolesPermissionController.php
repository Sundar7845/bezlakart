<?php

namespace App\Http\Controllers\Backend\Permissions;

use App\Enums\MenuPermissionType;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\RolePermissions;
use App\Models\Roles;
use App\Traits\Common;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RolesPermissionController extends Controller
{
 use Common;
    public function rolePermissionsView()
    {
        try {
            $roles = Roles::where('id', '!=', 1)->get();
            return view('backend.admin.permissions.roles_permissions', compact('roles'));
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function getMenus()
    {
        try {
            $menus = Menu::where('is_visible', 1)->get();
            return response()->json([
                'menus' => $menus
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function createPermission(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'ddlRole' => 'required'
            ]);

            if ($request->hdPermission_id == null) {
                $createPermission = ([
                    'menu_id' => $request->permission_id,
                    'role_id' => $request->ddlRole,
                    'created_by' => Auth::user()->id,
                    'created_at' => Carbon::now()
                ]);
                RolePermissions::create($createPermission);
                $notification = array(
                    'message' => 'Permission Created Successfully',
                    'alert-type' => 'success'
                );
            } else {
                RolePermissions::findorfail($request->hdPermission_id)->update([
                    'menu_id' => $request->permission_id,
                    'role_id' => $request->ddlRole,
                    'updated_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Permission Updated Successfully',
                    'alert-type' => 'success'
                );
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Permission Not Created!',
                'alert-type' => 'error'
            );
            $this->Log(__FUNCTION__, $request->method(), $e->getMessage(), Auth::user()->id, $request->ip(), gethostname());
        }
        return redirect()->route('rolePermissionsView')->with($notification);
    }

    public function deletePermission($id)
    {
        try {
            $permission = RolePermissions::findorfail($id);
            $permission->delete();

            $permission->Update([
                'deleted_by' => Auth::user()->id
            ]);

            $notification = array(
                'message' => 'Permission Deleted Successfully',
                'alert' => 'success'
            );
            return response()->json([
                'responseData' => $notification
            ]);
        } catch (Exception $e) {

            $notification = array(
                'message' => 'Permission could not be deleted',
                'alert' => 'error'
            );
            return response()->json([
                'responseData' => $notification
            ]);
        }
    }

    public function getPermissionById($id)
    {
        try {
            $permission = RolePermissions::where('id', $id)->first();
            return response()->json([
                'permission' => $permission
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function getPermissionData()
    {
        try {
            $permissionData = RolePermissions::select('role_permissions.*', 'roles.role_name')->join('roles', 'roles.id', 'role_permissions.role_id')->where('roles.id', '!=', 1)->get();

            return datatables()->of($permissionData)
                ->addColumn('action', function ($row) {
                    $html = "";
                    if ($this->isUserHavePermission(MenuPermissionType::Edit)) {
                        $html = '<i class="text-primary ti ti-pencil me-1"
                onclick="doEdit(' . $row->id . ');"></i> ';
                    }
                    if ($this->isUserHavePermission(MenuPermissionType::Delete)) {
                        $html .= '<i class="text-danger ti ti-trash me-1" id="confirm-color' . $row->id . '" onclick="showDelete(' . $row->id . ');"></i>';
                    }
                    return $html;
                })->toJson();
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}
