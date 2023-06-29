@extends('frontend.layouts.frontend_master')
@section('content')
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Store Registration</h1>
        </div>
    </div>
    <!-- End of Page Header -->
    <div class="container">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-8 mx-auto">
                    <div class="card">
                        <h4 class="text-center text-primary my-3 mt-4">Store Registration</h4>
                        <form class="forms-sample" name="storeregister" method="POST" action="{{ route('storeregisterstore') }}">
                            @csrf
                            <div class="auth-form-wrapper px-4 py-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="txtname" id="txtname" value="" title="Enter Your Name"
                                                class="form-control " placeholder="Username" required autocomplete="off">
                                            @error('txtname')
                                                <div class="text-danger">{{ $errors->first('txtname') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="shopname">Shop Name</label>
                                            <input type="text" name="txtshopname" value="" id="txtshopname" title="Enter Shop Name"
                                                class="form-control " placeholder="Shop Name" required autocomplete="off">
                                            @error('txtshopname')
                                                <div class="text-danger">{{ $errors->first('txtshopname') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="txtphone" value="" id="txtphone" title="Enter Mobile Number"
                                                class="form-control " placeholder="Mobile number" required
                                                autocomplete="off">
                                            @error('txtphone')
                                                <div class="text-danger">{{ $errors->first('txtphone') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="txtemail" value="" id="txtemail" title="Enter your Email"
                                                class="form-control " placeholder="E-mail" required autocomplete="off">
                                            @error('txtemail')
                                                <div class="text-danger">{{ $errors->first('txtemail') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" name="txtpassword" value="" id="password-field" title="Enter Your password"
                                                class="form-control " placeholder="Password" required autocomplete="off">
                                            <span toggle="#password-field"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            @error('txtpassword')
                                                <div class="text-danger">{{ $errors->first('txtpassword') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password">Password Confirmation</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                value="" class="form-control " id="password-field" title="Enter confirm password"
                                                placeholder="Password confirmation" required autocomplete="off">
                                            <span toggle="#password_confirmation"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $errors->first('password_confirmation') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="shopname">Bank Name</label>
                                            <input type="text" name="txtbank_name" value="" id="txtbank_name"
                                                class="form-control " placeholder="Bank Name" title="Enter Bank name" required autocomplete="off">
                                            @error('txtbank_name')
                                                <div class="text-danger">{{ $errors->first('txtbank_name') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="holdername">Account Holder Name</label>
                                            <input type="text" name="txtholdername" value="" title="Enter Account Holder Name" id="txtholdername"
                                                class="form-control " placeholder="Account Holder" required
                                                autocomplete="off">
                                            @error('txtholdername')
                                                <div class="text-danger">{{ $errors->first('txtholdername') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="accountnumber">Account Number</label>
                                            <input type="text" name="txtaccountnumber" value="" title="Enter Account Number"
                                                id="txtaccountnumber" class="form-control " placeholder="Account Number"
                                                required autocomplete="off">
                                            @error('txtaccountnumber')
                                                <div class="text-danger">{{ $errors->first('txtaccountnumber') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="ifsccode">IFSC Code</label>
                                            <input type="text" name="txtifsccode" value="" title="Enter IFSC Code" id="txtifsccode"
                                                class="form-control " placeholder="IFSC Code" required
                                                autocomplete="off">
                                            @error('txtifsccode')
                                                <div class="text-danger">{{ $errors->first('txtifsccode') }}
                                                </div>
                                            @enderror
                                            <span class="error"></span>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-icon-text mb-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('js/frontend/auth/storeregister.js') }}"></script>
@endsection
