document.addEventListener("DOMContentLoaded", function () {
    bindState();
    bindCity();
});

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
    $("form[name='store']").validate({
        rules: {
            txtStoreName: "required",
            ddlCountryName: "required",
            ddlStateName: "required",
            ddlCityName: "required",
            txtTax: "required",
            txtMinDelTime: "required",
            txtMaxDelTime: "required",
            ddlDelTimeType: "required",
            ddlSystemModule: "required",
            txtOwnerFirstName: "required",
            txtOwnerLastName: "required",
            txtMobile: "required",
            txtEmail: "required",
            // txtPassword: "required",
            // txtConfirmPassword: {
            //     required: true,
            //     equalTo: "#txtPassword",
            // },
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

function cancel() {
    var baseurl = window.location.origin;
    $("#ddlCountryName").val("").trigger("change");
    $("#ddlStateName").val("").trigger("change");
    $("#ddlCityName").val("").trigger("change");
    $("#ddlDelTimeType").val(1).trigger("change");
    $("#ddlSystemModule").val("").trigger("change");
    $("#txtStoreName").val("");
    $("#txtPassword").val("");
    $("#txtConfirmPassword").val("");
    $("#txtEmail").val("");
    $("#txtMobile").val("");
    $("#txtOwnerFirstName").val("");
    $("#txtOwnerLastName").val("");
    $("#txtTax").val("");
    $("#txtMinDelTime").val("");
    $("#txtMaxDelTime").val("");
    $("#fileStoreLogo").val("");
    $("#fileCoverPhoto").val("");
    $("#previewImage").attr("src", baseurl + "/images/no-image.jpg");
    $("#previewImage1").attr("src", baseurl + "/images/no-image.jpg");
}
