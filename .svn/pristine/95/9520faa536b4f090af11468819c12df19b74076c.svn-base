@extends('backend.layouts.admin_master')
@section('content')
@section('title')
    Notification Settings | Bezlakart
@endsection
<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 id="heading">Firebase Push Notification Setup</h5>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#" name="notificationsetup" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="input-label" for="exampleFormControlInput1">Server Key</label>
                                <textarea name="txtpush_notification_key" class="form-control" required></textarea>
                                @error('txtpush_notification_key')
                                    <div class="text-danger">{{ $errors->first('txtpush_notification_key') }}
                                    </div>
                                @enderror
                                <span class="error"></span>
                            </div>
                            <div class="text-end">
                                <button type="submit" onclick class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Push Messages</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Order Pending
                                                Message</label>
                                        </div>
                                        <textarea name="txtpending_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Order Confirmation
                                                Message</label>
                                        </div>
                                        <textarea name="txtconfirm_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Order Processing
                                                Message</label>
                                        </div>
                                        <textarea name="txtprocessing_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Store handover
                                                Message</label>
                                        </div>
                                        <textarea name="txtorder_handover_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Order Out for
                                                delivery Message</label>
                                        </div>
                                        <textarea name="txtout_for_delivery_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Order Delivered
                                                Message</label>
                                        </div>
                                        <textarea name="txtout_for_delivery_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Delivery Man
                                                Assign Message</label>
                                        </div>
                                        <textarea name="txtdelivery_boy_assign_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Delivery Man
                                                Delivered Message</label>
                                        </div>
                                        <textarea name="txtdelivery_boy_delivered_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Order Canceled
                                                Message</label>
                                        </div>
                                        <textarea name="txtorder_cancled_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Order Refunded
                                                Message</label>
                                        </div>
                                        <textarea name="txtorder_refunded_message" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="{{ asset('js/backend/settings/notification_settings.js') }}"></script>
@endsection
