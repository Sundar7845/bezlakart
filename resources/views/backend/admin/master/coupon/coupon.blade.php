@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Coupon | BezlaKart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Coupon</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('couponcreate') }}" method="POST" enctype="multipart/form-data"
                            name="coupon">
                            @csrf
                            <input type="hidden" name="hdCouponId" id="hdCouponId" value="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Coupon Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtCouponName"
                                            id="txtCouponName" title="Enter Coupon Name" placeholder="Enter Coupon Name"
                                            value="{{ old('txtCouponName') }}" required>
                                        @error('txtCouponName')
                                            <div class="text-danger">{{ $errors->first('txtCouponName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">System Module<span
                                                class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlSystemModuleName"
                                            id="ddlSystemModuleName" title="Please Select Main Category Name" required>
                                            <option value="">Select System Module</option>
                                            @foreach ($systemModules as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlSystemModuleName') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->module_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ddlSystemModuleName')
                                            <div class="text-danger">{{ $errors->first('ddlSystemModuleName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Coupon Type<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlCouponTypeName"
                                            id="ddlCouponTypeName" title="Please Select Coupon Type Name" required>
                                            <option value="">Select Coupon Type</option>
                                            @foreach ($coupon as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlCouponTypeName') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->coupon_type }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlCouponTypeName')
                                            <div class="text-danger">{{ $errors->first('ddlCouponTypeName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Store<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlStoreName" id="ddlStoreName"
                                            title="Please Select Coupon Type Name" required>
                                            <option value="">Select Store</option>
                                            @foreach ($store as $item)
                                                <option value="{{ $item->id }}">{{ $item->store_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlStoreName')
                                            <div class="text-danger">{{ $errors->first('ddlStoreName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Coupon Code<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtCouponCode"
                                            id="txtCouponCode" title="Enter Coupon Code" placeholder="Enter Coupon Code"
                                            value="{{ old('txtCouponCode') }}" required>
                                        @error('txtCouponCode')
                                            <div class="text-danger">{{ $errors->first('txtCouponCode') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Limit For Same User<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtLimitForSameUser"
                                            id="txtLimitForSameUser" title="Enter Limit" placeholder="Enter Limit"
                                            value="{{ old('txtLimitForSameUser') }}" required>
                                        @error('txtLimitForSameUser')
                                            <div class="text-danger">{{ $errors->first('txtLimitForSameUser') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Start Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="ddlStartDate" id="ddlStartDate"
                                            title="Please Choose Start Date" value="{{ old('ddlStartDate') }}"
                                            required>
                                        @error('ddlStartDate')
                                            <div class="text-danger">{{ $errors->first('ddlStartDate') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">End Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="ddlEndDate" id="ddlEndDate"
                                            title="Please Choose End Date" value="{{ old('ddlEndDate') }}" required>
                                        @error('ddlEndDate')
                                            <div class="text-danger">{{ $errors->first('ddlEndDate') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Discount Type<span
                                                class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlDiscountType"
                                            id="ddlDiscountType" title="Please Select Discount Type Name" required>
                                            <option value="">Select Discount Type</option>
                                            @foreach ($discountType as $item)
                                                <option value="{{ $item->id }}">{{ $item->discount_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ddlDiscountType')
                                            <div class="text-danger">{{ $errors->first('ddlDiscountType') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Discount<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtDiscount"
                                            id="txtDiscount" title="Please Enter Discount"
                                            placeholder="Enter Discount" value="{{ old('txtDiscount') }}" required>
                                        @error('txtDiscount')
                                            <div class="text-danger">{{ $errors->first('txtDiscount') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Max Discount<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtMaxDiscount"
                                            id="txtMaxDiscount" title="Please Enter Max Discount"
                                            placeholder="Enter Max Discount" value="{{ old('txtMaxDiscount') }}"
                                            required>
                                        @error('txtMaxDiscount')
                                            <div class="text-danger">{{ $errors->first('txtMaxDiscount') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Min Purchase <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtMinPurchase"
                                            id="txtMinPurchase" title="Please Enter Min Purchase"
                                            placeholder="Enter Min Purchase" value="{{ old('txtMinPurchase') }}"
                                            required>
                                        @error('txtMinPurchase')
                                            <div class="text-danger">{{ $errors->first('txtMinPurchase') }}
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
                        <h4 class="card-title mb-0 flex-grow-1">Coupon List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblCoupon" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>COUPON NAME</th>
                                        <th>COUPON CODE</th>
                                        <th>SYSTEM MODULE</th>
                                        <th>COUPON TYPE</th>
                                        <th>MIN PURCHASE</th>
                                        <th>MAX DISCOUNT</th>
                                        <th>DISCOUNT</th>
                                        <th>START DATE</th>
                                        <th>EXPIRY DATE</th>
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
<script src="{{ asset('js/backend/masters/coupon.js') }}"></script>
@endsection
