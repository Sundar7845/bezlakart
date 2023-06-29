@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Gold Plan | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Gold Plan</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('goldplancreate') }}" method="POST" enctype="multipart/form-data"
                            name="goldplan">
                            @csrf
                            <input type="hidden" name="hdGoldPlanId" id="hdGoldPlanId" value="">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Plan Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtPlanName" id="txtPlanName"
                                            placeholder="Enter Plan Name" title="Enter Plan Name"
                                            value="{{ old('txtPlanName') }}" required>
                                        @error('txtPlanName')
                                            <div class="text-danger">{{ $errors->first('txtPlanName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Plan Type<span class="text-danger">*</span></label>
                                        <select name="ddlPlanType" id="ddlPlanType" class="form-select"
                                            title="Please Select Plan Type">
                                            <option value="">Select Plan Type</option>
                                            @foreach ($planType as $item)
                                                <option value="{{ $item->id }}">{{ $item->plan_type }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlPlanType')
                                            <div class="text-danger">{{ $errors->first('ddlPlanType') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Gold Type<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtGoldType" id="txtGoldType"
                                            placeholder="Enter Gold Type" title="Enter Gold Type"
                                            value="{{ old('txtGoldType') }}" required>
                                        @error('txtGoldType')
                                            <div class="text-danger">{{ $errors->first('txtGoldType') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Gold Weight<span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="product-price-addon">GM</span>
                                            <input type="text" class="form-control" id="txtGoldWeight"
                                                name="txtGoldWeight" placeholder="Enter Gold Weight"
                                                title="Enter Gold Weight" aria-label="Price"
                                                aria-describedby="product-price-addon" required
                                                value="{{ old('txtGoldWeight') }}">
                                        </div>
                                        @error('txtGoldWeight')
                                            <div class="text-danger">{{ $errors->first('txtGoldWeight') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Plan Installment<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtPlanInstallment"
                                            id="txtPlanInstallment" placeholder="Enter Plan Installment"
                                            title="Enter Plan Installment" value="{{ old('txtPlanInstallment') }}"
                                            onkeyup="checkScore(this.value)" required>
                                        @error('txtPlanInstallment')
                                            <div class="text-danger">{{ $errors->first('txtPlanInstallment') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Plan Amount<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtPlanAmount"
                                            id="txtPlanAmount" placeholder="Enter Plan Amount" title="Enter Plan Amount"
                                            value="{{ old('txtPlanAmount') }}" onkeyup="checkScore(this.value)"
                                            required>
                                        @error('txtPlanAmount')
                                            <div class="text-danger">{{ $errors->first('txtPlanAmount') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Total Plan Amount<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtTotalPlanAmount"
                                            id="txtTotalPlanAmount" placeholder="Enter Total Plan Amount"
                                            title="Enter Total Plan Amount" value="{{ old('txtTotalPlanAmount') }}"
                                            readonly required>
                                        @error('txtTotalPlanAmount')
                                            <div class="text-danger">{{ $errors->first('txtTotalPlanAmount') }}
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
                        <h4 class="card-title mb-0 flex-grow-1"> Gold Plan List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblGoldPlan" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.NO</th>
                                        <th>PLAN NAME</th>
                                        <th>PLAN TYPE</th>
                                        <th>GOLD TYPE</th>
                                        <th>GOLD WEIGHT</th>
                                        <th>PLAN INSTALLMENT</th>
                                        <th>PLAN AMOUNT</th>
                                        <th>TOTAL PLAN AMOUNT</th>
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
<script src="{{ asset('js/backend/goldchit/goldplan.js') }}"></script>
@endsection
