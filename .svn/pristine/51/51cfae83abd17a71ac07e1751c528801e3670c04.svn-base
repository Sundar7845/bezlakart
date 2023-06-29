@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Payment Gateway Setup | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Payment Gateway Setup</h5>
        </div>
        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Payment Method</h5>
                        <form action="{{ route('paymentmethodcreate') }}" method="post">
                            @csrf
                            <input type="hidden" name="hdPaymentMethodId" id="hdPaymentMethodId"
                                value="{{ isset($payment->id) }}">
                            <div class="form-group mb-2">
                                <label class="control-label">Cash on delivery</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="rdCashOnDelivery" id="rdCashOnDelivery" value="1"
                                    @if (isset($payment) ? $payment->cash_on_delivery == 1 : '') checked @endif>
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="rdCashOnDelivery" id="rdCashOnDelivery" value="0"
                                    @if (isset($payment) ? $payment->cash_on_delivery == 0 : '') checked @endif>
                                <label style="padding-left: 10px">Inactive</label>
                                <br>
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Payment Method</h5>
                        <form action="{{ route('digitalpaymentmethodcreate') }}" method="post">
                            @csrf
                            <input type="hidden" name="hdPaymentMethodId" id="hdPaymentMethodId"
                                value="{{ isset($payment->id) }}">
                            <div class="form-group mb-2">
                                <label class="control-label text-capitalize">digital Payment</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" class="digital_payment" name="rdDigitalPayment"
                                    id="rdDigitalPayment" value="1"
                                    @if (isset($payment) ? $payment->digital_payment == 1 : '') checked @endif>
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" class="digital_payment" name="rdDigitalPayment"
                                    id="rdDigitalPayment" value="0"
                                    @if (isset($payment) ? $payment->digital_payment == 0 : '') checked @endif>
                                <label style="padding-left: 10px">Inactive</label>
                                <br>
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row digital_payment_methods" style="padding-bottom: 20px">
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">SSLCOMMERZ</h5>
                        <form
                            action="https://develop.keeggi.in/admin/business-settings/payment-method-update/ssl_commerz_payment"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">SSLCOMMERZ Payment</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Store ID </label><br>
                                <input type="text" class="form-control" name="store_id" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Store Password</label><br>
                                <input type="text" class="form-control" name="store_password" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Razor pay</h5>
                        <form action="{{ route('razorpaypaymentmethodcreate') }}" method="post">
                            @csrf
                            <input type="hidden" name="hdPaymentMethodId" id="hdPaymentMethodId"
                                value="{{ isset($payment->id) }}">
                            <div class="form-group mb-2">
                                <label class="control-label">Razor pay</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="rdRazorPay" id="rdRazorPay" value="1"
                                    @if (isset($payment) ? $payment->razor_pay == 1 : '') checked @endif>
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="rdRazorPay" id="rdRazorPay" value="0"
                                    @if (isset($payment) ? $payment->razor_pay == 0 : '') checked @endif>
                                <label style="padding-left: 10px">Inactive</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Razor key</label><br>
                                <input type="text" class="form-control" name="txtRazorPaykey" id="txtRazorPaykey"
                                    placeholder="Enter Razorpay Key"
                                    value="{{ isset($payment) ? $payment->razorpay_key : '' }}">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Razor secret</label><br>
                                <input type="text" class="form-control" name="txtRazorPaySecret"
                                    id="txtRazorPaySecret" placeholder="Enter Razorpay Secret"
                                    value="{{ isset($payment) ? $payment->razorpay_secret : '' }}">
                            </div>
                            <button type="submit" onclick class="btn btn-success mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Paypal</h5>
                        <form action="https://develop.keeggi.in/admin/business-settings/payment-method-update/paypal"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Paypal</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Paypal Client ID</label><br>
                                <input type="text" class="form-control" name="paypal_client_id" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Paypal secret </label><br>
                                <input type="text" class="form-control" name="paypal_secret" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Stripe</h5>
                        <form action="https://develop.keeggi.in/admin/business-settings/payment-method-update/stripe"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Stripe</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Published Key</label><br>
                                <input type="text" class="form-control" name="published_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">API Key</label><br>
                                <input type="text" class="form-control" name="api_key" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 26px!important;">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Paystack</h5>
                        <span class="badge badge-soft-danger">NB: Don`t forget to copy and past the callback url on
                            your paystack dashboard</span>
                        <form action="https://develop.keeggi.in/admin/business-settings/payment-method-update/paystack"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Paystack</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Public Key</label><br>
                                <input type="text" class="form-control" name="publicKey" value>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">secret Key </label><br>
                                <input type="text" class="form-control" name="secretKey" value>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Payment url</label><br>
                                <input type="text" class="form-control" name="paymentUrl" value>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Merchant Email</label><br>
                                <input type="text" class="form-control" name="merchantEmail" value>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                                <button type="button" class="btn btn-info mb-2 pull-right"
                                    onclick="copy_text('https://develop.keeggi.in/paystack-callback')">Copy callback
                                    url</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Senang Pay</h5>
                        <form
                            action="https://develop.keeggi.in/admin/business-settings/payment-method-update/senang_pay"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Senang Pay</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">secret Key</label><br>
                                <input type="text" class="form-control" name="secret_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Merchant ID</label><br>
                                <input type="text" class="form-control" name="merchant_id" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Flutterwave</h5>
                        <form
                            action="https://develop.keeggi.in/admin/business-settings/payment-method-update/flutterwave"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Flutterwave</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Public Key</label><br>
                                <input type="text" class="form-control" name="public_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">secret Key</label><br>
                                <input type="text" class="form-control" name="secret_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Hash</label><br>
                                <input type="text" class="form-control" name="hash" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">MercadoPago</h5>
                        <form
                            action="https://develop.keeggi.in/admin/business-settings/payment-method-update/mercadopago"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">MercadoPago</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Public Key</label><br>
                                <input type="text" class="form-control" name="public_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Access Token</label><br>
                                <input type="text" class="form-control" name="access_token" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Paymob accept</h5>
                        <form
                            action="https://develop.keeggi.in/admin/business-settings/payment-method-update/paymob_accept"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Paymob accept</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Callback</label>
                                <span class="btn btn-secondary btn-sm m-2"
                                    onclick="copyToClipboard('#id_paymob_accept')"><i class="tio-copy"></i> Copy
                                    callback url</span>
                                <br>
                                <p class="form-control" id="id_paymob_accept">
                                    https://develop.keeggi.in/paymob-callback</p>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">API key</label><br>
                                <input type="text" class="form-control" name="api_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Iframe id</label><br>
                                <input type="text" class="form-control" name="iframe_id" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Integration id</label><br>
                                <input type="text" class="form-control" name="integration_id" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">HMAC</label><br>
                                <input type="text" class="form-control" name="hmac" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4" style="display: block">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Bkash</h5>
                        <form action="https://develop.keeggi.in/admin/business-settings/payment-method-update/bkash"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Bkash</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">API key</label><br>
                                <input type="text" class="form-control" name="api_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">API Secret</label><br>
                                <input type="text" class="form-control" name="api_secret" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Username</label><br>
                                <input type="text" class="form-control" name="username" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Password</label><br>
                                <input type="text" class="form-control" name="password" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4" style="display: block">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Paytabs</h5>
                        <form action="https://develop.keeggi.in/admin/business-settings/payment-method-update/paytabs"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Paytabs</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Profile id</label><br>
                                <input type="text" class="form-control" name="profile_id" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Server</label><br>
                                <input type="text" class="form-control" name="server_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Base url by region</label><br>
                                <input type="text" class="form-control" name="base_url" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Paytm</h5>
                        <form action="https://develop.keeggi.in/admin/business-settings/payment-method-update/paytm"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Paytm</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Paytm merchant key</label><br>
                                <input type="text" class="form-control" name="paytm_merchant_key"
                                    value="T8@6Lvul7zOmMWkl">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Paytm merchant mid</label><br>
                                <input type="text" class="form-control" name="paytm_merchant_mid"
                                    value="tINepI30341494481491">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px">Paytm merchant website</label><br>
                                <input type="text" class="form-control" name="paytm_merchant_website"
                                    value="DEFAULT">
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5 class="text-center">Liqpay</h5>
                        <form action="https://develop.keeggi.in/admin/business-settings/payment-method-update/liqpay"
                            method="post">
                            <input type="hidden" name="_token" value="A6ZTI0Qjmr5JKuQadjOA9xH8IiwvWBm4Z0AGNr3N">
                            <div class="form-group mb-2">
                                <label class="control-label">Liqpay</label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1">
                                <label style="padding-left: 10px">Active</label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" checked>
                                <label style="padding-left: 10px">Inactive </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">Public Key</label><br>
                                <input type="text" class="form-control" name="public_key" value>
                            </div>
                            <div class="form-group mb-2">
                                <label class="text-capitalize" style="padding-left: 10px">PrivateKey</label><br>
                                <input type="text" class="form-control" name="private_key" value>
                            </div>
                            <button type="submit" onclick class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/masters/stateshippingcharge.js') }}"></script>
@endsection
