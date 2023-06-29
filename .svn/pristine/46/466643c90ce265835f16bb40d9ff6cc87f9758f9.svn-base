@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    SMS Gateway Setup | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">SMS Gateway Setup</h5>
        </div>
        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Twilio</h5>
                        <span class="badge badge-soft-info mb-3">NB : #OTP# will be replace with otp</span>
                        <form action="" name="twilio" method="post">
                            @csrf
                            <input type="hidden" name="hdToken" value="">
                            <div class="form-group mb-2">
                                <label class="control-label">Twilio</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="rdstatus" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="rdstatus" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">SID</label><br>
                                <input type="text" class="form-control" title="Enter SID" name="txtsid"
                                    placeholder="Enter SID" value="" required>
                                @error('txtsid')
                                    <div class="text-danger">{{ $errors->first('txtsid') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Messaging Service
                                    Sid</label><br>
                                <input type="text" class="form-control" name="txtMessagingservicesid" value=""
                                    placeholder="Enter Your Messaging Service Sid" title="Enter Message Service"
                                    required>
                                @error('txtsid')
                                    <div class="text-danger">{{ $errors->first('txtsid') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Token</label><br>
                                <input type="text" class="form-control" name="txttoken" value=""
                                    placeholder="Enter Token" title="Enter Token" required>
                                @error('txtsid')
                                    <div class="text-danger">{{ $errors->first('txtsid') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">From</label><br>
                                <input type="text" class="form-control" name="txtfrom" value=""
                                    placeholder="Enter Form" title="Enter Form" required>
                                @error('txtsid')
                                    <div class="text-danger">{{ $errors->first('txtsid') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">OTP template</label><br>
                                <input type="text" class="form-control" name="txtotptemplate" value=""
                                    placeholder="Enter Otp Template" title="Enter otp template" required>
                                @error('txtsid')
                                    <div class="text-danger">{{ $errors->first('txtsid') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Nexmo</h5>
                        <span class="badge badge-soft-info mb-3">NB : #OTP# will be replace with otp</span>
                        <form action="" name="nexomo" method="post">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group mb-2">
                                <label class="control-label">Nexmo</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="rdstatus" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="rdstatus" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">API key</label><br>
                                <input type="text" class="form-control" name="txtapi_key" value=""
                                    placeholder="Enter Api Key" title="Enter Api Key">
                                @error('txtapi_key')
                                    <div class="text-danger">{{ $errors->first('txtapi_key') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">API Secret</label><br>
                                <input type="text" class="form-control" name="txtapi_secret" value=""
                                    placeholder="Enter Api Secret" title="Enter Api Secret">
                                @error('txtapi_secret')
                                    <div class="text-danger">{{ $errors->first('txtapi_secret') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">From</label><br>
                                <input type="text" class="form-control" name="txtfrom" value=""
                                    placeholder="Enter Form" title="Enter form">
                                @error('txtfrom')
                                    <div class="text-danger">{{ $errors->first('txtfrom') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">OTP template</label><br>
                                <input type="text" class="form-control" name="txtotp_template" value=""
                                    placeholder="Enter OTP Template" title="Enter Otp template">
                                @error('txtotp_template')
                                    <div class="text-danger">{{ $errors->first('txtotp_template') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">2factor</h5>
                        <span class="badge badge-soft-info">EX of SMS provider's template : your OTP is XXXX here,
                            please
                            check.</span><br>
                        <span class="badge badge-soft-info mb-3">NB : XXXX will be replace with otp</span>
                        <form action="" name="factor" method="post">
                            <input type="hidden" name="hdToken" value="">
                            <div class="form-group mb-2">
                                <label class="control-label">2factor</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="rdstatus" value="1" checked>
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="rdstatus" value="0">
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">API key</label><br>
                                <input type="text" class="form-control" name="txtapi_key" value=""
                                    placeholder="Enter Api Key" title="Enter Api Key" required>
                                @error('txtapi_key')
                                    <div class="text-danger">{{ $errors->first('txtapi_key') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Msg91</h5>
                        <span class="badge badge-soft-info mb-3">NB : Keep an OTP variable in your SMS providers OTP
                            Template.</span><br>
                        <form action="" name="msg" method="post">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group mb-2">
                                <label class="control-label">Msg91</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="rdstatus" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="rdstatus" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Template ID</label><br>
                                <input type="text" class="form-control" name="txttemplate_id" value=""
                                    placeholder="Enter Template ID" title="Enter template Id" required>
                                @error('txttemplate_id')
                                    <div class="text-danger">{{ $errors->first('txttemplate_id') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Auth Key</label><br>
                                <input type="text" class="form-control" name="txtauthkey" value=""
                                    placeholder="Enter Auth Key" title="Enter Auth Key" required>
                                @error('txtauthkey')
                                    <div class="text-danger">{{ $errors->first('txtauthkey') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/settings/sms_module.js') }}"></script>
@endsection
