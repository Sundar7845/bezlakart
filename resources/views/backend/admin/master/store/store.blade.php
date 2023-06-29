@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Store | BezlaKart
@endsection
<div class="row">
    <form action="{{ route('storecreate') }}" method="POST" enctype="multipart/form-data" name="store">
        @csrf
        <input type="hidden" name="hdStoreId" id="hdStoreId" value="">
        <input type="hidden" name="hdStoreLogo" id="hdStoreLogo" value="">
        <input type="hidden" name="hdStoreCoverPic" id="hdStoreCoverPic" value="">
        <div class="col-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 id="heading">Store</h5>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Store Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtStoreName" id="txtStoreName"
                                            title="Enter Store Name" placeholder="Enter Store Name"
                                            value="{{ old('txtStoreName') }}" required>
                                        @error('txtStoreName')
                                            <div class="text-danger">{{ $errors->first('txtStoreName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Country Name<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlCountryName"
                                            id="ddlCountryName" title="Please Select Country Name" required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('ddlCountryName') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ddlCountryName')
                                            <div class="text-danger">{{ $errors->first('ddlCountryName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">State Name<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlStateName" id="ddlStateName"
                                            title="Please Select State Name" required>
                                            <option value="">Select State</option>
                                        </select>
                                        @error('ddlStateName')
                                            <div class="text-danger">{{ $errors->first('ddlStateName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">City Name<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlCityName" id="ddlCityName"
                                            title="Please Select State Name" required>
                                            <option value="">Select City</option>
                                        </select>
                                        @error('ddlCityName')
                                            <div class="text-danger">{{ $errors->first('ddlCityName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                {{-- <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">VAT/TAX (%)<span class="text-danger">*</span></label>
                                        <input type="text" name="txtTax" id="txtTax"
                                            class="form-control numvalidate" title="Enter Tax" placeholder="Enter Tax"
                                            value="{{ old('txtTax') }}">
                                        @error('txtTax')
                                            <div class="text-danger">{{ $errors->first('txtTax') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div> --}}

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Approx delivery time<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" name="txtMinDelTime" id="txtMinDelTime"
                                                class="form-control" placeholder="Enter Min"
                                                value="{{ old('txtMinDelTime') }}">
                                            <input type="number" name="txtMaxDelTime" id="txtMaxDelTime"
                                                class="form-control" placeholder="Enter Max"
                                                value="{{ old('txtMaxDelTime') }}">
                                            <select name="ddlDelTimeType" id="ddlDelTimeType"
                                                class="form-control text-capitalize" required aria-invalid="false">
                                                @foreach ($deliveryTimes as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('ddlDelTimeType') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->delivery_time_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('ddlStoreName')
                                            <div class="text-danger">{{ $errors->first('ddlStoreName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">System Module<span
                                                class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlSystemModule"
                                            id="ddlSystemModule" title="Please Select System Module" required>
                                            <option value="">Select System Module</option>
                                            @foreach ($systemModule as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlSystemModule') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->module_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlSystemModule')
                                            <div class="text-danger">{{ $errors->first('ddlSystemModule') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Owner Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtOwnerFirstName"
                                            id="txtOwnerFirstName" title="Enter Owner First Name"
                                            placeholder="Enter Owner First Name"
                                            value="{{ old('txtOwnerFirstName') }}" required>
                                        @error('txtOwnerFirstName')
                                            <div class="text-danger">{{ $errors->first('txtOwnerFirstName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtOwnerLastName"
                                            id="txtOwnerLastName" title="Enter Owner Last Name"
                                            placeholder="Enter Owner Last Name" value="{{ old('txtOwnerLastName') }}"
                                            required>
                                        @error('txtOwnerLastName')
                                            <div class="text-danger">{{ $errors->first('txtOwnerLastName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Mobile<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control mobilenumber" name="txtMobile"
                                            id="txtMobile" title="Enter Mobile Number"
                                            placeholder="Enter Mobile Number" value="{{ old('txtMobile') }}"
                                            required>
                                        @error('txtMobile')
                                            <div class="text-danger">{{ $errors->first('txtMobile') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Login Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="txtEmail" id="txtEmail"
                                            title="Enter Email" placeholder="Enter Email"
                                            value="{{ old('txtEmail') }}" required>
                                        @error('txtEmail')
                                            <div class="text-danger">{{ $errors->first('txtEmail') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="txtPassword"
                                            id="txtPassword" title="Enter Password" placeholder="*************"
                                            value="{{ old('txtPassword') }}" required>
                                        @error('txtPassword')
                                            <div class="text-danger">{{ $errors->first('txtPassword') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password<span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="txtConfirmPassword"
                                            id="txtConfirmPassword" title="Enter Confirm Password"
                                            placeholder="*************" value="{{ old('txtConfirmPassword') }}"
                                            required>
                                        @error('txtConfirmPassword')
                                            <div class="text-danger">{{ $errors->first('txtConfirmPassword') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Uploads</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Store Logo<span class="text-danger"> <small>(124 *
                                                    320 px)</small> *</span></label>
                                        <input type="file" class="form-control" name="fileStoreLogo"
                                            id="fileStoreLogo" height="124" width="320" required>
                                    </div>
                                    <div class="img mt-2">
                                        <img src="{{ asset('images/no-image.jpg') }}" id="previewImage"
                                            width="100" height="100">
                                    </div>
                                    @error('fileStoreLogo')
                                        <div class="text-danger">{{ $errors->first('fileStoreLogo') }}
                                        </div>
                                    @enderror
                                    <span class="error"></span>
                                </div>

                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label class="form-label">Store Cover Photo<span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="fileCoverPhoto"
                                            id="fileCoverPhoto" required>
                                    </div>
                                    <div class="img mt-2">
                                        <img src="{{ asset('images/no-image.jpg') }}" id="previewImage1"
                                            style="max-width: 100%; 1px solid; border-radius: 10px; max-height: 200px">
                                    </div>
                                    @error('fileCoverPhoto')
                                        <div class="text-danger">{{ $errors->first('fileCoverPhoto') }}
                                        </div>
                                    @enderror
                                    <span class="error"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-end">
                <div class="mt-4 mb-3">
                    <button type="submit" id="btnSave" class="btn btn-success btn-flat">Save</button>
                    <button type="button" class="btn btn-danger" id="btnCancel" onclick="cancel();">Cancel</button>
                    <a href="{{ route('storelist') }}" class="btn btn-warning">GoTo List</a>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/masters/store.js') }}"></script>
@endsection
