const inputFiles = document.querySelectorAll('input[type="file"]');
const previewImages = document.querySelectorAll('img[id^="previewImage"]');

inputFiles.forEach(function (inputFile, index) {
    inputFile.addEventListener("change", function () {
        const file = this.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            previewImages[index].setAttribute("src", this.result);
        });

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});

// jquery Validation
$(function () {
    $("form[name='business_setting']").validate({
        rules: {
            txtBusinessName: "required",
            txtOtpLength: "required",
            txtExpiryDuration: "required",
            txtEmailExpiryDuration: "required",
            txtRefferalCodeLength: "required",
            txtPlaystoreUrl: "required",
            txtAppstoreUrl: "required",
            ddlCountry: "required",
            txtCurrencySymbol: "required",
            txtFreeDeliveryOver: "required",
            txtPhone: "required",
            txtemail: "required",
            txtCompanyWebsite: "required",
            txtCompanyAddress: "required",
            rdDeliveryManCancel: "required",
            rdStoreCancelOrder: "required",
            rdShowEarning: "required",
            rdAdminOrderNotify: "required",
            rdStoreSelfRegistration: "required",
            rdOtpLogin: "required",
            rdGoogleLogin: "required",
            rdFacebookLogin: "required",
            rdEcommerceModule: "required",
            rdGoldModule: "required",
            txtFreeDeliveryOver: "required",
            // fileLogo: "required",
            // fileFavIcon: "required",
            // fileAppLogo: "required",
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

document.addEventListener("DOMContentLoaded", function () {
    $("#ddlCountry").on("change", function () {
        getSymbol();
    });
});

function getSymbol() {
    var country_id = $("#ddlCountry").val();
    $.ajax({
        url: "getcountrysymbol",
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            country_id: country_id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (result) {
            $("#txtCurrencySymbol").val(result.symbol.currency_symbol);
        },
    });
}
