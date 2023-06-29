@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    About us | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">About us</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('adminaboutus.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="hdAboutId" id="hdAboutId" value="{{ isset($aboutus->id) }}">
                            <div class="form-group mb-3">
                                <textarea id="ckeditor-classic" name="txtAdminaboutus" required>{{ isset($aboutus) ? $aboutus->about_us : '' }}</textarea>
                                @error('txtAdminaboutus')
                                    <div class="text-danger">{{ $errors->first('txtAdminaboutus') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
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
<script src="{{ asset('js/backend/settings/about_us.js') }}"></script>
<!-- ckeditor -->
<script src="{{ asset('libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
@endsection
