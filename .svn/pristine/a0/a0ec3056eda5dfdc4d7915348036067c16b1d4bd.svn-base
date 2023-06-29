@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Addon | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Addon</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('addoncreate') }}" method="POST" enctype="multipart/form-data"
                            name="addon">
                            @csrf
                            <input type="hidden" name="hdAddonId" id="hdAddonId" value="">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Addon Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtAddonName" id="txtAddonName"
                                            placeholder="Enter Addon Name" title="Enter Addon Name"
                                            value="{{ old('txtAddonName') }}" required>
                                        @error('txtAddonName')
                                            <div class="text-danger">{{ $errors->first('txtAddonName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3 store_show">
                                    <div class="mb-3">
                                        <label class="form-label">Store<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlStore" id="ddlStore"
                                            title="Please Select Store Name">
                                            <option value="">Select Store Name</option>
                                            @foreach ($store as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlStore') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->store_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlStore')
                                            <div class="text-danger">{{ $errors->first('ddlStore') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mt-4 mb-3">
                                        <button type="submit" id="btnSave"
                                            class="btn btn-success btn-flat">Save</button>
                                        <button type="button" class="btn btn-danger" id="btnCancel"
                                            onclick="cancel();">Cancel</button>
                                    </div>
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
                        <h4 class="card-title mb-0 flex-grow-1"> Brand List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblAddon" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>ADDON NAME</th>
                                        <th>STORE NAME</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
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
<script src="{{ asset('js/backend/masters/addon.js') }}"></script>
@endsection
