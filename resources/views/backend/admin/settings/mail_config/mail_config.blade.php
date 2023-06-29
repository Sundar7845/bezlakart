@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Mail Config | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form class="card-body" action="{{ route('mailconfigcreate') }}" method="post"
                            enctype="multipart/form-data" name="mail">
                            @csrf
                            <input type="hidden" name="hdMailConfigId" id="hdMailConfigId"
                                value="{{ isset($mailconfig->id) }}">
                            <div class="form-group mb-3 text-center">
                                <label class="control-label h3">SMTP mail config</label>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Status</label>
                            </div>
                            <div class="form-group mb-3 mt-2">
                                <input type="radio" name="rdStatus" value="1"
                                    @if (isset($mailconfig) ? $mailconfig->status == 1 : '') checked @endif>
                                <label style="padding-left: 10px">Active</label>
                            </div>
                            <div class="form-group mb-3">
                                <input type="radio" name="rdStatus" value="0"
                                    @if (isset($mailconfig) ? $mailconfig->status == 0 : '') checked @endif>
                                <label style="padding-left: 10px">Inactive</label>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Mailer
                                    Name</label><br>
                                <input type="text" placeholder="Enter Mailer Name" title="Enter Mailer Name"
                                    class="form-control" name="txtMailerName"
                                    value="{{ isset($mailconfig) ? $mailconfig->mailer_name : '' }}" required>
                                @error('txtMailerName')
                                    <div class="text-danger">{{ $errors->first('txtMailerName') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Host</label><br>
                                <input type="text" class="form-control" name="txtHost" placeholder="Enter Host"
                                    title="Enter Host" value="{{ isset($mailconfig) ? $mailconfig->host : '' }}"
                                    required>
                                @error('txtHost')
                                    <div class="text-danger">{{ $errors->first('txtHost') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Driver</label><br>
                                <input type="text" class="form-control" placeholder="Enter Driver"
                                    title="Enter Driver" name="txtDriver"
                                    value="{{ isset($mailconfig) ? $mailconfig->driver : '' }}" required>
                                @error('txtDriver')
                                    <div class="text-danger">{{ $errors->first('txtDriver') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Port</label><br>
                                <input type="text" class="form-control" placeholder="Enter Port" title="Enter Port"
                                    name="txtPort" value="{{ isset($mailconfig) ? $mailconfig->port : '' }}" required>
                                @error('txtPort')
                                    <div class="text-danger">{{ $errors->first('txtPort') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Username</label><br>
                                <input type="text" placeholder="Enter User Name" title="Enter User Name"
                                    class="form-control" name="txtUsername"
                                    value="{{ isset($mailconfig) ? $mailconfig->username : '' }}" required>
                                @error('txtUsername')
                                    <div class="text-danger">{{ $errors->first('txtUsername') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Email
                                    ID</label><br>
                                <input type="email" placeholder="ex : ex@yahoo.com" title="Enter Email"
                                    class="form-control" name="txtemail"
                                    value="{{ isset($mailconfig) ? $mailconfig->email : '' }}" required>
                                @error('txtemail')
                                    <div class="text-danger">{{ $errors->first('txtemail') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Encryption</label><br>
                                <input type="text" placeholder="ex : tls" title="Enter Encryption"
                                    class="form-control" name="txtEncryption"
                                    value="{{ isset($mailconfig) ? $mailconfig->encryption : '' }}" required>
                                @error('txtEncryption')
                                    <div class="text-danger">{{ $errors->first('txtEncryption') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label style="padding-left: 10px">Password</label><br>
                                <input type="password" class="form-control" name="txtPassword"
                                    placeholder="*********" title="Enter Password"
                                    value="{{ isset($mailconfig) ? $mailconfig->encryption : '' }}" required>
                                @error('txtPassword')
                                    <div class="text-danger">{{ $errors->first('txtPassword') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <button type="submit" onclick class="btn btn-success mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/settings/mail_config.js') }}"></script>
@endsection
