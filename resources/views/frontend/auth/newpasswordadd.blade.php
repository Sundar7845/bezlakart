@extends('frontend.layouts.frontend_master')
@section('content')
    <main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Reset Password</h1>
            </div>
        </div>
        <!-- End of Page Header -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Reset Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <form action="{{ route('resetpasswordstore') }}" name="resetpassword" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="tab-pane active" id="sign-in">
                                    <div class="form-group">
                                        <label>Email address *</label>
                                        <input type="email" class="form-control" name="txtResetemail" id="txtResetemail"
                                            placeholder="Enter your email" title="Email or mobile number is required" required>
                                            <span class="error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="txtNewpassword" id="txtNewpassword"
                                            placeholder="Enter your password" title="password is required" required>
                                            <span class="error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password *</label>
                                        <input type="password" class="form-control" name="txtNewconfirmpassword" id="txtNewconfirmpassword"
                                            placeholder="Enter your Confirm Password" title="confirm password is required" required>
                                            <span class="error"></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control">Reset password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('footer')
    <script src="{{ asset('js/frontend/auth/resetpassword.js') }}"></script>
@endsection
