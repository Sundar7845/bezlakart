@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Privacy policy | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Privacy policy</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('privacyandpolicy.store') }}" name="privacypolicy" method="POST">
                            @csrf
                            <input type="hidden" name="hdPrivacyId" id="hdPrivacyId"
                                value="{{ isset($privacy_and_policy->id) }}">
                            <div class="form-group mb-3">
                                <textarea id="ckeditor-classic" name="txtPrivacyandPolicy" required>
                                        {{ isset($privacy_and_policy) ? $privacy_and_policy->privacy_and_policy : '' }}
                                </textarea>
                            </div>
                            @error('txtPrivacyandPolicy')
                                <div class="text-danger">{{ $errors->first('txtPrivacyandPolicy') }}
                                </div>
                            @enderror
                            <span class="error"></span>
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
<script src="{{ asset('js/backend/settings/privacy_and_policy.js') }}"></script>
<!-- ckeditor -->
<script src="{{ asset('libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
@endsection
