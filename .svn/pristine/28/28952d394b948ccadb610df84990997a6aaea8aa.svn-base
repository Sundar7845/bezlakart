@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Social Pages | Bezlakart
@endsection
<div class="row">
    <form action="{{ route('socialmediacreate') }}" method="POST" enctype="multipart/form-data" name="socialmedia">
        @csrf
        <input type="hidden" name="hdSocialMediaId" id="hdSocialMediaId" value="">
        <div class="col-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 id="heading">Social Media</h5>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Social Media Name<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="ddlSocialMedia" id="ddlSocialMedia"
                                            title="Please Select Social Media Platform" required>
                                            <option value="">Select Social Media Platform</option>
                                            @foreach ($socialmedia as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlSocialMedia') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->social_media_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ddlSocialMedia')
                                            <div class="text-danger">{{ $errors->first('ddlSocialMedia') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Social Media URL<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="txtSocialMediaUrl" id="txtSocialMediaUrl"
                                            class="form-control numvalidate" title="Enter Social Media URL"
                                            placeholder="Enter Social Media URL" value="{{ old('txtSocialMediaUrl') }}">
                                        @error('txtSocialMediaUrl')
                                            <div class="text-danger">{{ $errors->first('txtSocialMediaUrl') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="mt-4 mb-3">
                                            <button type="submit" id="btnSave"
                                                class="btn btn-success btn-flat">Save</button>
                                            <button type="button" class="btn btn-danger" id="btnCancel"
                                                onclick="cancel();">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1"> Social Media Links</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-datatable table-responsive pt-0">
                                    <table id="tblSocialMedia" class="table">
                                        <thead class="border-bottom">
                                            <tr>
                                                <th>S.No</th>
                                                <th>NAME</th>
                                                <th>LINK</th>
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
    </form>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/settings/social_media.js') }}"></script>
@endsection
