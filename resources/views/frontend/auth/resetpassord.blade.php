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

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Reset Password</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
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
                            <form action="" method="POST">
                                @csrf
                                <div class="tab-pane active" id="sign-in">
                                    <div class="form-group">
                                        <label>Email address *</label>
                                        <input type="email" class="form-control" name="txtresetEmail" id="txtresetEmail"
                                            placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="txtpassword" id="txtpassword"
                                            placeholder="Enter Password" required>
                                        <span toggle="#txtpassword"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Confirm Password *</label>
                                        <input type="password" class="form-control" name="txtConfirmpassword" id="txtConfirmpassword"
                                            placeholder="Enter your confirm Password" required>
                                        <span toggle="#txtConfirmpassword"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary form-control">Sign In</button>
                                </div>
                            </form>
                        </div>
                        <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="{{ route('facebooklogin') }}" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="{{ route('googlelogin') }}" class="social-icon social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
