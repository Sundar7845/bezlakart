@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    State | BezlaKart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1">State</h5>
        </div>
        <div class="col-lg-12 mb-4 mb-lg-0">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('syncstate') }}" class="btn btn-success">Sync State</a>
                </div>
                <div class="card-body">
                    <div class="card-datatable table-responsive pt-0">
                        <table id="tblState" class="table">
                            <thead class="border-bottom">
                                <tr>
                                    <th>S.No</th>
                                    <th>STATE CODE</th>
                                    <th>STATE NAME</th>
                                    <th>STATUS</th>
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
<script src="{{ asset('js/backend/masters/state.js') }}"></script>
@endsection
