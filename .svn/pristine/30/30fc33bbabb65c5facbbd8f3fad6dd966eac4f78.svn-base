@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Attribute | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Attribute</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('attributecreate') }}" method="POST" enctype="multipart/form-data"
                            name="attribute">
                            @csrf
                            <input type="hidden" name="hdAttributeId" id="hdAttributeId" value="">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Attribute Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtAttributeName"
                                            id="txtAttributeName" placeholder="Enter Attribute Name"
                                            title="Enter Attribute Name" value="{{ old('txtAttributeName') }}" required>
                                        @error('txtAttributeName')
                                            <div class="text-danger">{{ $errors->first('txtAttributeName') }}
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
                        <h4 class="card-title mb-0 flex-grow-1"> Attribute List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblAttribute" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>ATTRIBUTE NAME</th>
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
<script src="{{ asset('js/backend/masters/attribute.js') }}"></script>
@endsection
