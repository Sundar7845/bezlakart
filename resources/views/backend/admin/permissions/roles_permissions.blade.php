@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Role Permissions | Bezlakart
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('js/backend/permissions/ui.dynatree.css') }}">
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-3">
            <h5 class="mb-0 pb-1" id="heading">Role Permissions</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('createPermission') }}" name="rolePermissions" id="rolePermissions"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="hidden" name="hdPermission_id" id="hdPermission_id" value="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role Name<span class="text-danger">*</span></label>
                                    <select required name="ddlRole" id="ddlRole" class="select2 form-select" title="Select Role Name">
                                        <option value="0">Select</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->role_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('ddlRole')
                                        <div class="text-danger">{{ $errors->first('ddlRole') }}
                                        </div>
                                    @enderror
                                    <span class="error"></span>
                                </div>
                                <div class="col-md-6" id="divMenuList"></div>
                                <input type="hidden" name="permission_id" id="permission_id" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <button type="submit" id="btnSave" class="btn btn-success btn-flat">Save</button>
                                    <button type="button" class="btn btn-danger" id="btnCancel"
                                        onclick="cancel();">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Permissions List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblRolePermissionsList"
                                class="display table table-bordered dt-responsive dataTable dtr-inline"
                                style="width: 100%;" aria-describedby="ajax-datatables_info">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Permission Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/permissions/roles_permissions.js') }}"></script>
<script src="{{ asset('js/backend/permissions/jquery-ui.js') }}"></script>
<script src="{{ asset('js/backend/permissions/jquery.dynatree.js') }}"></script>
@endsection
