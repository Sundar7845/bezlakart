@extends('backend.layouts.admin_master')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-12 mb-2 mb-sm-0">
                <h1 class="page-header-title"><i class="tio-filter-list"></i> Stock report</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12 mb-2">
                <select name="module_id" class="form-control js-select2-custom"
                    title="Select Modules">
                    <option value selected>All Stocks</option>
                    <option value="10">In stock</option>
                    <option value="14">Out of Stock</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 class="mb-0 pb-1">Stock Report</h5>
            </div>
            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblStockreport" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>NAME</th>
                                        <th>STORE</th>
                                        <th>CURRENT STOCK</th>
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
@endsection
@section('footer')
<script src="{{ asset('js/backend/reports/report.js') }}"></script>
@endsection
