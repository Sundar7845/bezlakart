@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Product | Bezlakart
@endsection
@section('header')
    <!-- Plugins css -->
    <link href="{{ asset('libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Update Product</h5>
        </div>
        <!-- end page title -->

        <form action="{{ route('productcreate') }}" method="POST" enctype="multipart/form-data" name="product">
            @csrf
            <input type="hidden" name="hdProductId" id="hdProductId" value="{{ $product->id }}">
            <input type="hidden" name="hdProductImage" id="hdProductImage" value="{{ $product->product_image }}">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Product Name</label>
                                <input type="text" class="form-control" id="txtProductName" name="txtProductName"
                                    value="{{ $product->product_name }}" title="Enter Product Name"
                                    placeholder="Enter Product Name" required>
                                @error('txtProductName')
                                    <div class="text-danger">{{ $errors->first('txtProductName') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div>
                                <label>Product Description</label>
                                <textarea name="txtProductDescription" id="ckeditor-classic" class="txtProductDescription" cols="30" rows="10"
                                    required>{{ $product->description }}</textarea>
                            </div>
                            @error('txtProductDescription')
                                <div class="text-danger">{{ $errors->first('txtProductDescription') }}
                                </div>
                            @enderror
                            <span class="error"></span>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Product Image</h5>
                                <p class="text-muted">Add Product main Image.</p>
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute top-100 start-100 translate-middle">
                                            <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Select Image">
                                                <div class="avatar-xs">
                                                    <div
                                                        class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <input class="form-control d-none" name="fileProductImage"
                                                id="product-image-input" type="file" height="900" width="800"
                                                required>
                                            @error('fileProductImage')
                                                <div class="text-danger">{{ $errors->first('fileProductImage') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="{{ asset($product->product_image) }}" id="product-img"
                                                    class="avatar-md h-auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="fs-14 mb-1">Product Gallery</h5>
                                <p class="text-muted">Add Product Gallery Images.</p>

                                {{-- <div class="dropzone">
                                    <div class="fallback">
                                        <input name="fileProductMulImg[]" id="fileProductMulImg" type="file"
                                            multiple="multiple">
                                        @error('fileProductMulImg')
                                            <div class="text-danger">{{ $errors->first('fileProductMulImg') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>

                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Drop files here or click to upload.</h5>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <!-- This is used as the file preview template -->
                                        <div class="border rounded">
                                            <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                            src="#" alt="Product-Image" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove
                                                        class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul> --}}
                                <!-- end dropzon-preview -->
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p>Upload Images</p>
                                            <input type="file" id="fileProductMulImg" name="fileProductMulImg[]"
                                                multiple="" data-max_length="20" height="900" width="800"
                                                class="form-control upload__inputfile">
                                        </label>
                                        @error('multi_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="upload__img-wrap">
                                        @foreach ($productMultiImg as $img)
                                            <div class='upload__img-box'>
                                                <div style='background-image: url({{ asset($img->product_image) }})'
                                                    class='img-bg'>
                                                    <div class='upload__img-close' id={{ $img->id }}
                                                        onclick="deleteimg({{ $img->id }});">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('fileProductImage')
                                        <div class="text-danger">{{ $errors->first('fileProductImage') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                        role="tab">
                                        General Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata"
                                        role="tab">
                                        Meta Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input">Store
                                                    Name</label>
                                                <select class="form-select js-example-basic-single" id="ddlStoreName"
                                                    name="ddlStoreName" title="Please Select Store">
                                                    <option value="">Select Store Name</option>
                                                    @foreach ($store as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $product->store_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->store_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ddlStoreName')
                                                    <div class="text-danger">{{ $errors->first('ddlStoreName') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Brand
                                                    Name</label>
                                                <select class="form-select js-example-basic-single" id="ddlBrandName"
                                                    name="ddlBrandName" title="Please Select Brand">
                                                    <option value="">Select Brand Name</option>
                                                    @foreach ($brand as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $product->brand_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->brand_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ddlBrandName')
                                                    <div class="text-danger">{{ $errors->first('ddlBrandName') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="stocks-input">Stocks</label>
                                                <input type="text" class="form-control" id="txtStocks"
                                                    name="txtStocks" placeholder="Enter Stocks" title="Enter Stock"
                                                    value="{{ $product->product_stock }}" required>
                                                @error('txtStocks')
                                                    <div class="text-danger">{{ $errors->first('txtStocks') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-price-input">Price</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="product-price-addon">$</span>
                                                    <input type="text" class="form-control" id="txtPrice"
                                                        name="txtPrice" placeholder="Enter price" title="Enter Price"
                                                        aria-label="Price" aria-describedby="product-price-addon"
                                                        required value="{{ $product->product_price }}">
                                                </div>
                                                @error('txtPrice')
                                                    <div class="text-danger">{{ $errors->first('txtPrice') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="product-discount-input">Discount</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"
                                                        id="product-discount-addon">%</span>
                                                    <input type="text" class="form-control" id="txtDiscount"
                                                        name="txtDiscount" placeholder="Enter discount"
                                                        title="Enter Discount" aria-label="discount"
                                                        value="{{ $product->discount }}"
                                                        aria-describedby="product-discount-addon">
                                                    @error('txtDiscount')
                                                        <div class="text-danger">
                                                            {{ $errors->first('txtDiscount') }}
                                                        </div>
                                                    @enderror
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Discount
                                                    Type</label>
                                                <select class="form-select" id="ddlDiscount" name="ddlDiscount"
                                                    title="Please Select Brand">
                                                    <option value="">Select Discount</option>
                                                    @foreach ($discountTypes as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $product->discount_type_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->discount_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ddlDiscount')
                                                    <div class="text-danger">{{ $errors->first('ddlDiscount') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span>
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-6 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="manufacturer-brand-input">Addons</label>
                                                <select class="form-select js-example-basic-single" id="ddlAddon" name="ddlAddon"
                                                    title="Please Select Addon">
                                                    <option value="">Select Addon</option>
                                                    @foreach ($addons as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('ddlAddon') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->addon_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ddlAddon')
                                                    <div class="text-danger">{{ $errors->first('ddlAddon') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span>
                                            </div>
                                        </div> --}}

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="orders-input">Fixed Commission
                                                    Amount</label>
                                                <input type="text" class="form-control" id="txtCommissionAmt"
                                                    name="txtCommissionAmt"
                                                    placeholder="Enter Fixed Commission Amount"
                                                    title="Enter Fixed Commission Amount"
                                                    value="{{ $product->commission_amount }}" required>
                                                @error('txtCommissionAmt')
                                                    <div class="text-danger">
                                                        {{ $errors->first('txtCommissionAmt') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end tab-pane -->

                                <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta-title-input">Meta title</label>
                                                <input
                                                    type="text"class="form-control"placeholder="Enter meta title"
                                                    title="Enter meta title" id="txtMetaTitle" name="txtMetaTitle"
                                                    value="{{ old('txtMetaTitle') }}">
                                                {{-- @error('txtMetaTitle')
                                                    <div class="text-danger">
                                                        {{ $errors->first('txtMetaTitle') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span> --}}
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta-keywords-input">Meta
                                                    Keywords</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter meta keywords" title="Enter meta keywords"
                                                    id="txtMetaKeywords" name="txtMetaKeywords"
                                                    value="{{ old('txtMetaKeywords') }}">
                                                {{-- @error('txtMetaKeywords')
                                                    <div class="text-danger">
                                                        {{ $errors->first('txtMetaKeywords') }}
                                                    </div>
                                                @enderror
                                                <span class="error"></span> --}}
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div>
                                        <label class="form-label" for="meta-description-input">Meta
                                            Description</label>
                                        <textarea class="form-control" id="txtMetaDescription" name="txtMetaDescription"
                                            placeholder="Enter meta description" rows="3">{{ old('txtMetaDescription') }}</textarea>
                                        {{-- @error('txtMetaDescription')
                                                    <div class="text-danger">
                                                        {{ $errors->first('txtMetaDescription') }}
                                                    </div>
                                            @enderror
                                            <span class="error"></span> --}}
                                    </div>
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm">Submit</button>
                        <a href="{{ route('productlist') }}" class="btn btn-danger">Cancel</a>
                        <a href="{{ route('productlist') }}" class="btn btn-warning">GoTo List</a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Category</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Main Category</label>

                                <select class="form-select js-example-basic-single" name="ddlMainCategory"
                                    id="ddlMainCategory" title="Please select Main Category" required>
                                    <option value="">Select Main Category</option>
                                    @foreach ($mainCategory as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->main_category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->main_category_name }}</option>
                                    @endforeach
                                </select>
                                @error('ddlMainCategory')
                                    <div class="text-danger">
                                        {{ $errors->first('ddlMainCategory') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select js-example-basic-single" name="ddlCategory"
                                    id="ddlCategory" title="Please Select Category" required>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('ddlCategory')
                                    <div class="text-danger">
                                        {{ $errors->first('ddlCategory') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>

                            <div>
                                <label class="form-label">Sub Category</label>
                                <select class="form-select js-example-basic-single" name="ddlSubCategory"
                                    id="ddlSubCategory" title="Plese Select Sub Category" required>
                                    <option value="">Select Sub Category</option>
                                    @foreach ($subcategory as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->sub_category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->sub_category_name }}</option>
                                    @endforeach
                                </select>
                                @error('ddlSubCategory')
                                    <div class="text-danger">
                                        {{ $errors->first('ddlSubCategory') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">System Module</h5>
                        </div>
                        <!-- end card body -->
                        <div class="card-body">
                            <div>
                                <label class="form-label">System Module </label>
                                <select class="form-select js-example-basic-single" name="ddlSystemModule"
                                    id="ddlSystemModule" title="Please Select System Module" required>
                                    <option value="">Select System Module</option>
                                    @foreach ($systemModule as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->system_module_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->module_name }}</option>
                                    @endforeach
                                </select>
                                @error('ddlSystemModule')
                                    <div class="text-danger">
                                        {{ $errors->first('ddlSystemModule') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Tags</h5>
                        </div>
                        <div class="card-body">
                            <div class="hstack gap-3 align-items-start">
                                <div class="flex-grow-1">
                                    <input class="form-control" data-choices data-choices-multiple-remove="true"
                                        placeholder="Enter tags" title="Enter tags" type="text"
                                        name="txtProductTag" id="txtProductTag"
                                        value="{{ $product->product_tags }}" />
                                    {{-- @error('txtProductTag')
                                        <div class="text-danger">
                                            {{ $errors->first('txtProductTag') }}
                                        </div>
                                    @enderror
                                    <span class="error"></span> --}}
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Short Description</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2">Add short description for product</p>
                            <textarea class="form-control" id="txtShortDescription" name="txtShortDescription"
                                placeholder="Enter Product Short Description" title="Enter Product Short Description" rows="3">
                                {{ $product->short_description }}
                            </textarea>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Attribute</h5>
                        </div>
                        <div class="card-body">
                            <select class="js-example-basic-multiple select2-hidden-accessible" multiple
                                id="choice_attributes" name="ddlAttribute" data-select2-id="select2-data-19-025m"
                                tabindex="-1" aria-hidden="true">
                                <option value="1">Colour</option>
                                <option value="2">Design</option>
                                <option value="3">Flavour</option>
                                <option value="4">Size</option>
                                <option value="5">Style</option>
                                <option value="6">Type</option>
                                <option value="7">Weight</option>
                            </select>

                            <div class="col-md-12 mt-2 mb-2">
                                <div class="customer_choice_options" id="customer_choice_options">
                                </div>
                            </div>
                            <div class="col-md-12 mt-2 mb-2">
                                <div class="variant_combination" id="variant_combination">
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

        </form>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/masters/product.js') }}"></script>
<!-- ckeditor -->
<script src="{{ asset('libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<!-- dropzone js -->
<script src="{{ asset('libs/dropzone/dropzone-min.js') }}"></script>
@endsection
