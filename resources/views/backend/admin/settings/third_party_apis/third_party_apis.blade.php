@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Third Party APIs | Bezlakart
@endsection
<div class="page-header mb-3">
    <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">Third Party APIs</h1>
            <span class="badge badge-soft-dark">NB: Client key should have enable map javascript api and you can restrict
                it with http refere. Server key should have enable place api key and you can restrict it with
                ip.</span><br>
            <span class="badge badge-soft-dark"> You can use same api for both field without any restrictions.</span><br>
        </div>
    </div>
</div>

<div class="row gx-2 gx-lg-3">
    <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
        <form action="{{ route('thirdpartyapistore') }}" name="thirdpartyapi" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="hdThirdPartySettingId" id="hdThirdPartySettingId"
                value="{{ isset($thirdpartyapisetting) ? $thirdpartyapisetting->id : '' }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label class="input-label" style="padding-left: 10px">Map api key (Client)</label>
                        <input type="text" placeholder="Map api key (Client)" class="form-control"
                            name="txtMapApiKeyClient" id="txtMapApiKeyClient"
                            value="{{ isset($thirdpartyapisetting) ? $thirdpartyapisetting->map_api_key_client : '' }}"
                            title="Enter map api key server" required>
                        @error('txtMapApiKeyClient')
                            <div class="text-danger">{{ $errors->first('txtMapApiKeyClient') }}
                            </div>
                        @enderror
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label class="input-label" style="padding-left: 10px">Map api key (Server)</label>
                        <input type="text" placeholder="Map api key (Server)" class="form-control"
                            name="txtMapApiKeyServer" id="txtMapApiKeyServer"
                            value="{{ isset($thirdpartyapisetting) ? $thirdpartyapisetting->map_api_key_server : '' }}"
                            title="Enter map api key server" required>
                        @error('txtMapApiKeyServer')
                            <div class="text-danger">{{ $errors->first('txtMapApiKeyServer') }}
                            </div>
                        @enderror
                        <span class="error"></span>
                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <button type="submit" onclick class="btn btn-success mb-2">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/settings/third_party_apis.js') }}"></script>
@endsection
