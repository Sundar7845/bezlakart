@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Refunded Orders | BezlaKart
@endsection
<div class="row mb-3 mt-2">
    <div class="col">
        <h4>Refunded Orders</h4>
    </div>
    <div class="col-md-3">
        <div class="d-flex justify-content-end">
            <select class="form-select js-example-basic-single" name="ddlState" id="ddlState" title="Select State"
                required>
                <option value="">Select Module</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <div class="card-datatable table-responsive pt-0">
                        <table id="tblRefundedorders" class="table">
                            <thead class="border-bottom">
                                <tr>
                                    <th>S.No</th>
                                    <th>ORDER DATE</th>
                                    <th>ORDER NO</th>
                                    <th>CUSTOMER NAME</th>
                                    <th>QTY</th>
                                    <th>SUBTOTAL</th>
                                    <th>DISCOUNT</th>
                                    <th>SHIPPING</th>
                                    <th>STORE NAME</th>
                                    <th>PAYMENT STATUS</th>
                                    <th>TOTAL AMOUNT</th>
                                    <th>ORDER STATUS</th>   
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>01/02/2022</td>
                                    <td>6665548877</td>
                                    <td>Nabil</td>
                                    <td>5</td>
                                    <td>1000</td>
                                    <td>5</td>
                                    <td>100</td>
                                    <td>Amul</td>
                                    <td><span class="badge rounded-pill text-bg-success">Paid</span></td>
                                    <td>800</td>
                                    <td><span class="badge rounded-pill text-bg-primary">Pending</span></td>
                                    <td><button type="button" class="btn btn-info btn-sm">update</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/orders/refunded_orders.js') }}"></script>
@endsection
