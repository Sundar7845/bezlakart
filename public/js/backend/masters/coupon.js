var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if (month < 10) month = "0" + month.toString();
if (day < 10) day = "0" + day.toString();

var maxDate = year + "-" + month + "-" + day;

// or instead:
// var maxDate = dtToday.toISOString().substr(0, 10);

document.addEventListener("DOMContentLoaded", function () {
    $("#ddlStartDate").val(maxDate);
    $("#ddlEndDate").val(maxDate);
    $("#ddlStartDate").attr("min", maxDate);
    $("#ddlEndDate").attr("min", maxDate);

    $("#tblCoupon").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "coupondata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "coupon_name" },
            { data: "coupon_code" },
            { data: "module_name" },
            { data: "coupon_type" },
            { data: "min_purchase" },
            { data: "max_discount" },
            { data: "discount_value" },
            { data: "start_date" },
            { data: "end_date" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                style="position: relative; margin-left: 7px;">
                <input class="form-check-input" type="checkbox" role="switch" id="chkCoupon${
                    row.id
                }" onclick="doStatus(${row.id});" ${data == 1 ? "checked" : ""}>
            </div>`;
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
    });
});

// jquery Validation
$(function () {
    $("form[name='coupon']").validate({
        rules: {
            txtCouponName: "required",
            ddlSystemModuleName: "required",
            ddlCouponTypeName: "required",
            ddlStoreName: "required",
            txtCouponCode: "required",
            txtLimitForSameUser: "required",
            ddlStartDate: "required",
            ddlEndDate: "required",
            ddlDiscountType: "required",
            txtDiscount: "required",
            txtMaxDiscount: "required",
            txtMinPurchase: "required",
        },
        errorPlacement: function (error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents(".form-group"));
            } else {
                // This is the default behavior
                // error.insertAfter(element);
                if (element.siblings(".error").html() == undefined) {
                    error.appendTo(element.parent().next(".error"));
                } else {
                    error.appendTo(element.siblings(".error"));
                }
            }
        },
    });
});

function doEdit(id) {
    $("#hdCouponId").val(id);
    $("#txtCouponName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update Coupon");
    getCouponById(id);
}

function getCouponById(id) {
    $.ajax({
        type: "GET",
        url: "getcoupon/" + id,
        dataType: "json",
        success: function (data) {
            $("#txtCouponName").val(data.coupon.coupon_name);
            $("#ddlSystemModuleName")
                .val(data.coupon.system_module_id)
                .trigger("change");
            setTimeout(function () {
                $("#ddlCouponTypeName")
                    .val(data.coupon.coupon_type_id)
                    .trigger("change");
            }, 1000);
            setTimeout(function () {
                $("#ddlStoreName").val(data.coupon.store_id).trigger("change");
            }, 2000);
            setTimeout(function () {
                $("#ddlDiscountType")
                    .val(data.coupon.discount_type_id)
                    .trigger("change");
            }, 3000);
            $("#txtCouponCode").val(data.coupon.coupon_code);
            $("#txtLimitForSameUser").val(data.coupon.same_user_limit);
            $("#ddlStartDate").val(data.coupon.start_date);
            $("#ddlEndDate").val(data.coupon.end_date);
            $("#txtDiscount").val(data.coupon.discount_value);
            $("#txtMaxDiscount").val(data.coupon.max_discount);
            $("#txtMinPurchase").val(data.coupon.min_purchase);
            $("#hdBrandImage").val(data.coupon.brand_image);
            $("#previewImage").attr("src", data.coupon.brand_image);
            $("#fileBrandImage").removeAttr("required");
        },
    });
}

function showDelete(id) {
    confirmDelete(id, "coupon/", "tblCoupon");
}

function doStatus(id) {
    var status = $("#chkCoupon" + id).is(":checked");
    confirmStatusChange(
        id,
        "coupon/",
        "tblCoupon",
        status == true ? 1 : 0,
        "chkCoupon"
    );
}
