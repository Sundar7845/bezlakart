@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Business Setup | BezlaKart
@endsection
<div class="row">
    <form action="{{ route('businesssettingsstore') }}" method="post" enctype="multipart/form-data"
        name="business_setting">
        @csrf
        <input type="hidden" name="hdBusineesSettingsId" id="hdBusineesSettingsId"
            value="{{ isset($businesssetting) ? $businesssetting->id : '' }}">
        <input type="hidden" name="hdLogo" id="hdLogo"
            value="{{ isset($businesssetting) ? $businesssetting->company_logo : '' }}">
        <input type="hidden" name="hdAppLogo" id="hdAppLogo"
            value="{{ isset($businesssetting) ? $businesssetting->app_logo : '' }}">
        <input type="hidden" name="hdFavIcon" id="hdFavIcon"
            value="{{ isset($businesssetting) ? $businesssetting->favicon : '' }}">
        <div class="col-12">
            <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                <h5 id="heading">Business Setup</h5>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header d-flex mb-3">
                                <h4 class="card-title"><i class="ri-settings-5-line"></i>
                                    Maintenance
                                    mode</h4>
                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <label for="input-group-custom-showcode" class="form-label text-muted">
                                        </label>
                                        <input class="form-check-input code-switcher" type="checkbox"
                                            id="chkMaintenanceMode" name="chkMaintenanceMode"
                                            value="{{ isset($businesssetting) ? ($businesssetting->is_maintenace_mode == 0 ? 1 : 0) : 0 }}"
                                            @if (isset($businesssetting) ? $businesssetting->is_maintenace_mode == 1 : '') checked @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label" for="exampleFormControlInput1">Business
                                            Name <span class="text-danger">*</span></label>
                                        <input type="text" name="txtBusinessName" id="txtBusinessName"
                                            value="{{ isset($businesssetting) ? $businesssetting->company_name : '' }}"
                                            class="form-control" placeholder="Enter Business Name"
                                            title="Enter Business Name" required>
                                        @error('txtBusinessName')
                                            <div class="text-danger">{{ $errors->first('txtBusinessName') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">OTP Length <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtOtpLength" id="txtOtpLength"
                                            placeholder="Enter OTP Length" title="Enter OTP Length"
                                            value="{{ isset($businesssetting) ? $businesssetting->otp_length : '' }}"
                                            required>
                                        @error('txtOtpLength')
                                            <div class="text-danger">{{ $errors->first('txtOtpLength') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">OTP Expiry Duration <small
                                                class="text-muted">(mins)</small><span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="txtExpiryDuration"
                                            id="txtExpiryDuration" placeholder="Enter Expiry Duration"
                                            title="Enter Expiry Duration"
                                            value="{{ isset($businesssetting) ? $businesssetting->otp_expiry_duration : '' }}"
                                            required>
                                        @error('txtExpiryDuration')
                                            <div class="text-danger">{{ $errors->first('txtExpiryDuration') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Email Expiry Duration <small
                                                class="text-muted">(mins)</small><span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="txtEmailExpiryDuration"
                                            id="txtEmailExpiryDuration" placeholder="Enter Email Expiry Duration"
                                            title="Enter Email Expiry Duration"
                                            value="{{ isset($businesssetting) ? $businesssetting->email_expiry_duration : '' }}"
                                            required>
                                        @error('txtEmailExpiryDuration')
                                            <div class="text-danger">{{ $errors->first('txtEmailExpiryDuration') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Refferal Code Length <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtRefferalCodeLength"
                                            id="txtRefferalCodeLength" placeholder="Enter Refferal Code Length"
                                            title="Enter Refferal Code Length"
                                            value="{{ isset($businesssetting) ? $businesssetting->referral_code_length : '' }}"
                                            required>
                                        @error('txtRefferalCodeLength')
                                            <div class="text-danger">{{ $errors->first('txtRefferalCodeLength') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Playstore URL <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtPlaystoreUrl"
                                            id="txtPlaystoreUrl" placeholder="Enter Playstore URL"
                                            title="Enter Playstore URL"
                                            value="{{ isset($businesssetting) ? $businesssetting->play_store_url : '' }}"
                                            required>
                                        @error('txtPlaystoreUrl')
                                            <div class="text-danger">{{ $errors->first('txtPlaystoreUrl') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Appstore URL <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtAppstoreUrl"
                                            id="txtAppstoreUrl" placeholder="Enter Appstore URL"
                                            title="Enter Appstore URL"
                                            value="{{ isset($businesssetting) ? $businesssetting->app_store_url : '' }}"
                                            required>
                                        @error('txtAppstoreUrl')
                                            <div class="text-danger">{{ $errors->first('txtAppstoreUrl') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label" for="country">Country <span
                                                class="text-danger">*</span></label>
                                        <select id="ddlCountry" name="ddlCountry"
                                            class="form-select  js-example-basic-single"
                                            title="Please Select Country">
                                            <option value="">Select Country Name</option>
                                            @foreach ($country as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ isset($businesssetting) ? ($businesssetting->country_id == $item->id ? 'selected' : '') : '' }}>
                                                    {{ $item->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ddlCountry')
                                            <div class="text-danger">{{ $errors->first('ddlCountry') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label" for="exampleFormControlInput1">Currency Symbol
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtCurrencySymbol"
                                            id="txtCurrencySymbol" placeholder="Enter Currency Symbol"
                                            title="Enter Currency Symbol"
                                            value="{{ isset($businesssetting) ? $businesssetting->currency_symbol : '' }}"
                                            readonly required>
                                        @error('txtCurrencySymbol')
                                            <div class="text-danger">{{ $errors->first('txtCurrencySymbol') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label ">Store can cancel a order <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdStoreCancelOrder" id="rdStoreCancelOrder"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->store_cancel_order == 1 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdStoreCancelOrder">Yes</label>
                                                </div>
                                            </div>

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdStoreCancelOrder" id="rdStoreCancelOrder"
                                                        @if (isset($businesssetting) ? $businesssetting->store_cancel_order == 0 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdStoreCancelOrder">No</label>
                                                </div>
                                            </div>

                                        </div>
                                        @error('rdStoreCancelOrder')
                                            <div class="text-danger">{{ $errors->first('rdStoreCancelOrder') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Deliveryman
                                            can cancel a order <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdDeliveryManCancel" id="rdDeliveryManCancel"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->deliveryman_cancel_order == 1 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdDeliveryManCancel">Yes</label>
                                                </div>
                                            </div>

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdDeliveryManCancel" id="rdDeliveryManCancel"
                                                        @if (isset($businesssetting) ? $businesssetting->deliveryman_cancel_order == 0 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdDeliveryManCancel">No</label>
                                                </div>
                                            </div>

                                        </div>
                                        @error('rdDeliveryManCancel')
                                            <div class="text-danger">{{ $errors->first('rdDeliveryManCancel') }}
                                            </div>
                                        @enderror
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label ">Show earning for each order
                                            (Deliveryman app) <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdShowEarning" id="rdShowEarning"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->show_earning_for_order == 1 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdShowEarning">Yes</label>
                                                </div>
                                            </div>

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdShowEarning" id="rdShowEarning"
                                                        @if (isset($businesssetting) ? $businesssetting->show_earning_for_order == 0 : '') checked @endif>
                                                    <label class="custom-control-label" for="rdShowEarning">No</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label ">Admin
                                            Order Notification <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdAdminOrderNotify" id="rdAdminOrderNotify"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->admin_order_notification == 1 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdAdminOrderNotify">on</label>
                                                </div>
                                            </div>


                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdAdminOrderNotify" id="rdAdminOrderNotify"
                                                        @if (isset($businesssetting) ? $businesssetting->admin_order_notification == 0 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdAdminOrderNotify">off</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label ">Store self registration <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdStoreSelfRegistration" id="rdStoreSelfRegistration"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->store_self_registration == 1 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdStoreSelfRegistration">on</label>
                                                </div>
                                            </div>


                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdStoreSelfRegistration" id="rdStoreSelfRegistration"
                                                        @if (isset($businesssetting) ? $businesssetting->store_self_registration == 0 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdStoreSelfRegistration">off</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">OTP Login <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdOtpLogin" id="rdOtpLogin"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->otp_login == 1 : '') checked @endif>
                                                    <label class="custom-control-label" for="rdOtpLogin">on</label>
                                                </div>
                                            </div>


                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdOtpLogin" id="rdOtpLogin"
                                                        @if (isset($businesssetting) ? $businesssetting->otp_login == 0 : '') checked @endif>
                                                    <label class="custom-control-label" for="rdOtpLogin">off</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Google Login <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdGoogleLogin" id="rdGoogleLogin"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->google_signup == 1 : '') checked @endif>
                                                    <label class="custom-control-label" for="rdGoogleLogin">on</label>
                                                </div>
                                            </div>


                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdGoogleLogin" id="rdGoogleLogin"
                                                        @if (isset($businesssetting) ? $businesssetting->google_signup == 0 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdGoogleLogin">off</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Facebook Login <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdFacebookLogin" id="rdFacebookLogin"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->facebook_signup == 1 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdFacebookLogin">on</label>
                                                </div>
                                            </div>


                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdFacebookLogin" id="rdFacebookLogin"
                                                        @if (isset($businesssetting) ? $businesssetting->facebook_signup == 0 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdFacebookLogin">off</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Gold Module<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdGoldModule" id="rdGoldModule"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->gold_module == 1 : '') checked @endif>
                                                    <label class="custom-control-label" for="rdGoldModule">on</label>
                                                </div>
                                            </div>


                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdGoldModule" id="rdGoldModule"
                                                        @if (isset($businesssetting) ? $businesssetting->gold_module == 0 : '') checked @endif>
                                                    <label class="custom-control-label" for="rdGoldModule">off</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="input-label">Ecommerce Module<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-md-down-break">

                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="1"
                                                        name="rdEcommerceModule" id="rdEcommerceModule"
                                                        title="Please Check yes or no"
                                                        @if (isset($businesssetting) ? $businesssetting->ecommerce == 1 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdEcommerceModule">on</label>
                                                </div>
                                            </div>


                                            <div class="form-control mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="0"
                                                        name="rdEcommerceModule" id="rdEcommerceModule"
                                                        @if (isset($businesssetting) ? $businesssetting->ecommerce == 0 : '') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="rdEcommerceModule">off</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group p-2 mb-3">
                                            <label class="input-label text-capitalize"
                                                for="txtAdminCommission">Default
                                                Admin Commission <span class="text-danger">*</span></label>
                                            <input type="number" name="txtAdminCommission" class="form-control"
                                                id="txtAdminCommission"
                                                value="{{ isset($businesssetting) ? $businesssetting->admin_commission : '' }}"
                                                required placeholder="Enter Default Admin Commission"
                                                title="Enter Default Admin Commission">
                                            @error('txtAdminCommission')
                                                <div class="text-danger">{{ $errors->first('txtAdminCommission') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group p-2 border mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="input-label  text-capitalize"
                                                        for="free_delivery_over">Free delivery over
                                                        (₹) <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    <div
                                                        class="form-check form-switch form-switch-right form-switch-md mb-2">
                                                        <label for="input-group-custom-showcode"
                                                            class="form-label text-muted">
                                                        </label>
                                                        <input class="form-check-input code-switcher" type="checkbox"
                                                            id="chkFreeDeliveryOver" name="chkFreeDeliveryOver"
                                                            value="1"
                                                            @if (isset($businesssetting) ? $businesssetting->is_free_delivery == 1 : '') checked @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="number" name="txtFreeDeliveryOver" class="form-control"
                                                id="txtFreeDeliveryOver"placeholder="Enter Amount"
                                                title="Enter Amount"
                                                value="{{ isset($businesssetting) ? $businesssetting->free_delivery_amount : '' }}"
                                                required>
                                            @error('txtFreeDeliveryOver')
                                                <div class="text-danger">{{ $errors->first('txtFreeDeliveryOver') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="input-label " for="exampleFormControlInput1">Phone <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyPhone" id="txtCompanyPhone"
                                                class="form-control mobilenumber" placeholder="Enter Phone"
                                                title="Enter Phone"
                                                value="{{ isset($businesssetting) ? $businesssetting->company_phone : '' }}"
                                                required>
                                            @error('txtCompanyPhone')
                                                <div class="text-danger">{{ $errors->first('txtCompanyPhone') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="input-label " for="exampleFormControlInput1">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" name="txtCompanyEmail" id="txtCompanyEmail"
                                                class="form-control" placeholder="Enter Email" title="Enter Email"
                                                value="{{ isset($businesssetting) ? $businesssetting->company_email : '' }}"
                                                required>
                                            @error('txtCompanyEmail')
                                                <div class="text-danger">{{ $errors->first('txtCompanyEmail') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="input-label " for="txtCompanyWebsite">Company Website <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyWebsite" id="txtCompanyWebsite"
                                                class="form-control" placeholder="Enter Company Website"
                                                title="Enter Company Website"
                                                value="{{ isset($businesssetting) ? $businesssetting->company_website : '' }}"
                                                required>
                                            @error('txtCompanyWebsite')
                                                <div class="text-danger">{{ $errors->first('txtCompanyWebsite') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="input-label " for="txtCompanyAddress">Company Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyAddress" id="txtCompanyAddress"
                                                class="form-control" placeholder="Enter Company Address"
                                                title="Enter Company Address"
                                                value="{{ isset($businesssetting) ? $businesssetting->company_address : '' }}"
                                                required>
                                            @error('txtCompanyAddress')
                                                <div class="text-danger">{{ $errors->first('txtCompanyAddress') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="input-label ">Logo <span
                                                    class="text-danger">*</span></label>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="fileLogo" id="fileLogo"
                                                    class="custom-file-input form-control" title="Please Choose Logo">
                                                <div class="img mt-2">
                                                    <img src="{{ asset(isset($businesssetting) ? $businesssetting->company_logo : 'images/no-image.jpg') }}"
                                                        id="previewImage" width="100" height="100">
                                                </div>
                                            </div>
                                            @error('fileLogo')
                                                <div class="text-danger">{{ $errors->first('fileLogo') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="input-label ">Fav Icon <span
                                                    class="text-danger">*</span></label>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="fileFavIcon" id="fileFavIcon"
                                                    class="custom-file-input form-control"
                                                    title="Please Choose Fav Icon">
                                                <div class="img mt-2">
                                                    <img src="{{ asset(isset($businesssetting) ? $businesssetting->favicon : 'images/no-image.jpg') }}"
                                                        id="previewImage1" width="100" height="100">
                                                </div>
                                            </div>
                                            @error('fileFavIcon')
                                                <div class="text-danger">{{ $errors->first('fileFavIcon') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="input-label ">App Logo <span
                                                    class="text-danger">*</span></label>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="fileAppLogo" id="fileAppLogo"
                                                    class="custom-file-input form-control"
                                                    title="Please Choose App Logo">
                                                <div class="img mt-2">
                                                    <img src="{{ asset(isset($businesssetting) ? $businesssetting->app_logo : 'images/no-image.jpg') }}"
                                                        id="previewImage2" width="100" height="100">
                                                </div>
                                            </div>
                                            @error('fileAppLogo')
                                                <div class="text-danger">{{ $errors->first('fileAppLogo') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" onclick class="btn btn-success mb-2">Submit</button>
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
<script src="{{ asset('js/backend/settings/business_setup.js') }}"></script>
@endsection
