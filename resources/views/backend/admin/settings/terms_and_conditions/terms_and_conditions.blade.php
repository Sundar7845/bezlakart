@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Terms and Conditions | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Terms and Conditions</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('termsandconditions.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="hdTermsId" id="hdTermsId" value="{{ isset($data->id) }}">
                            <div class="form-group mb-3">
                                <textarea id="ckeditor-classic" name="txtTermsandCondition">{{ isset($data) ? $data->terms_and_conditions : '' }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/settings/terms_and_conditions.js') }}"></script>
<!-- ckeditor -->
<script src="{{ asset('libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
@endsection
