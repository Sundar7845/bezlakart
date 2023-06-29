@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Brand | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Brand</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('brandcreate') }}" method="POST" enctype="multipart/form-data"
                            name="brand">
                            @csrf
                            <input type="hidden" name="hdBrandId" id="hdBrandId" value="">
                            <input type="hidden" name="hdBrandImage" id="hdBrandImage" value="">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Category Name<span
                                                class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlSubCategoryName"
                                            id="ddlSubCategoryName" title="Please Select Sub Category Name" required>
                                            <option value="">Select Sub Category</option>
                                            @foreach ($subCategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    {{ old('ddlSubCategoryName') == $subcategory->id ? 'selected' : '' }}>
                                                    {{ $subcategory->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlSubCategoryName')
                                            <div class="text-danger">{{ $errors->first('ddlSubCategoryName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Brand Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtBrandName" id="txtBrandName"
                                            placeholder="Enter Brand Name" title="Enter Brand Name"
                                            value="{{ old('txtBrandName') }}" required>
                                        @error('txtBrandName')
                                            <div class="text-danger">{{ $errors->first('txtBrandName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Brand Image <span class="text-danger"><small>(320 *
                                                    124 px)</small> *</span></label>
                                        <input type="file" class="form-control" name="fileBrandImage"
                                            id="fileBrandImage" width="320" height="124" required>
                                    </div>
                                    <div class="img mt-2">
                                        <img src="{{ asset('images/no-image.jpg') }}" id="previewImage" width="100"
                                            height="100">
                                    </div>
                                    @error('fileBrandImage')
                                        <div class="text-danger">{{ $errors->first('fileBrandImage') }}
                                        </div>
                                    @enderror
                                    <span class="error"></span>
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
                            <table id="tblBrand" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>BRAND IMAGE</th>
                                        <th>BRAND NAME</th>
                                        <th>SUB CATEGORY Name</th>
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
<script src="{{ asset('js/backend/masters/brand.js') }}"></script>
@endsection
