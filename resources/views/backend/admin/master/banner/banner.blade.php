@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Banner | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Banner</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('bannercreate') }}" method="POST" enctype="multipart/form-data"
                            name="banner">
                            @csrf
                            <input type="hidden" name="hdBannerId" id="hdBannerId" value="">
                            <input type="hidden" name="hdBannerImage" id="hdBannerImage" value="">
                            <input type="hidden" name="hdHeight" id="hdHeight" value="">
                            <input type="hidden" name="hdWidth" id="hdWidth" value="">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Banner Name<span class="text-danger">*</span></label>
                                        <input type="text" name="txtBannerName" id="txtBannerName"
                                            class="form-control" placeholder="Enter Banner Name"
                                            title="Enter Banner Name" value="{{ old('txtBannerName') }}" required>
                                        @error('txtBannerName')
                                            <div class="text-danger">{{ $errors->first('txtBannerName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Banner URL</label>
                                        <input type="text" name="txtBannerUrl" id="txtBannerUrl" class="form-control"
                                            placeholder="Enter Banner URL" title="Enter Banner URL"
                                            value="{{ old('txtBannerUrl') }}">
                                        @error('txtBannerUrl')
                                            <div class="text-danger">{{ $errors->first('txtBannerUrl') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Banner Location<span
                                                class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlBannerLocation"
                                            id="ddlBannerLocation" title="Please Select Banner Location Name" required>
                                            <option value="">Select Banner Location</option>
                                            @foreach ($bannerLocation as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlBannerLocation') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->banner_location }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlBannerLocation')
                                            <div class="text-danger">{{ $errors->first('ddlBannerLocation') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">System Module<span
                                                class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlSystemModule"
                                            id="ddlSystemModule" title="Please Select System Module Name" required>
                                            <option value="">Select System Module</option>
                                            @foreach ($systemModule as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlSystemModule') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->module_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlSystemModule')
                                            <div class="text-danger">{{ $errors->first('ddlSystemModule') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Banner Type<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlBannerType" id="ddlBannerType"
                                            title="Please Select Banner Type Name" required>
                                            <option value="">Select Banner Type</option>
                                            @foreach ($bannerType as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlBannerType') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->banner_type }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlBannerType')
                                            <div class="text-danger">{{ $errors->first('ddlBannerType') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3 store_show">
                                    <div class="mb-3">
                                        <label class="form-label">Store<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlStore" id="ddlStore"
                                            title="Please Select Store Name">
                                            <option value="">Select Store Name</option>
                                            @foreach ($store as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('ddlStore') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->store_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ddlStore')
                                            <div class="text-danger">{{ $errors->first('ddlStore') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3 product_show" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">product<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ddlProduct" id="ddlProduct"
                                            title="Please Select Product Name">
                                            <option value="">Select Product Name</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->product_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ddlProduct')
                                            <div class="text-danger">{{ $errors->first('ddlProduct') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Banner Image<span class="text-danger">* <span
                                                    id="banner_size"></span></span></label>
                                        <input type="file" class="form-control" name="fileBannerImage"
                                            id="fileBannerImage" required>
                                    </div>
                                    <div class="img mt-2">
                                        <img src="{{ asset('images/no-image.jpg') }}" id="previewImage"
                                            width="" height="">
                                    </div>
                                    @error('fileBannerImage')
                                        <div class="text-danger">{{ $errors->first('fileBannerImage') }}
                                        </div>
                                    @enderror
                                    <span class="error"></span>
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
                        <h4 class="card-title mb-0 flex-grow-1"> Brand List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table id="tblBanner" class="table">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>S.No</th>
                                        <th>BANNER IMAGE</th>
                                        <th>SYSTEM MODULE</th>
                                        <th>BANNER TYPE</th>
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
<script src="{{ asset('js/backend/masters/banner.js') }}"></script>
@endsection
