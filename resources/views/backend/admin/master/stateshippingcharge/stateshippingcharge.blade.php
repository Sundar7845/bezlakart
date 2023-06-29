@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    State Shipping Charge | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">State Shipping Charge</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('stateshippingchargestore') }}" method="POST"
                            enctype="multipart/form-data" name="shippingcharge">
                            @csrf
                            <input type="hidden" name="hdshippingId" id="hdshippingId" value="">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">State<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlState" id="ddlState"
                                            title="Select State" required>
                                            <option value="">Select State</option>
                                            @foreach ($state as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlState') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->state_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlState')
                                            <div class="text-danger">{{ $errors->first('ddlState') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Charge<span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control numvalidate" name="txtShippingCharge"
                                            id="txtShippingCharge" placeholder="Enter Shipping Charge"
                                            value="{{ old('txtShippingCharge') }}" title="Enter Shipping Charge"
                                            required>
                                        @error('txtShippingCharge')
                                            <div class="text-danger">{{ $errors->first('txtShippingCharge') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Cod Charge<span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control numvalidate" name="txtCodCharge"
                                            id="txtCodCharge" placeholder="Enter Cod Charge"
                                            value="{{ old('txtCodCharge') }}" title="Enter Cod Charge"
                                            required>
                                        @error('txtCodCharge')
                                            <div class="text-danger">{{ $errors->first('txtCodCharge') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
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
                        <h4 class="card-title mb-0 flex-grow-1"> Shipping Charges List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblShippingcharge" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>STATE NAME</th>
                                        <th>SHIPPING CHARGE</th>
                                        <th>COD CHARGE</th>
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
<script src="{{ asset('js/backend/masters/stateshippingcharge.js') }}"></script>
@endsection
