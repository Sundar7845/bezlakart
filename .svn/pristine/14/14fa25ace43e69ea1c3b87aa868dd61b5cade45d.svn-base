@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Roles | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-3">
            <h5 class="mb-0 pb-1" id="heading">Roles</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('createroles') }}" name="roles" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="hdRoleId" id="hdRoleId" value="">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Role Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="txtRoleName" id="txtRoleName"
                                        title="Enter Role Name" placeholder="Enter Role Name"
                                        value="{{ old('txtRoleName') }}" required>
                                    @error('txtRoleName')
                                        <div class="text-danger">{{ $errors->first('txtRoleName') }}
                                        </div>
                                    @enderror
                                    <span class="error"></span>
                                </div>
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
                        <h4 class="card-title mb-0 flex-grow-1">Roles List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblRolesList"
                                class="display table table-bordered dt-responsive dataTable dtr-inline"
                                style="width: 100%;" aria-describedby="ajax-datatables_info">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Role Name</th>
                                        <th>Status</th>
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
<script src="{{ asset('js/backend/permissions/roles.js') }}"></script>
@endsection
