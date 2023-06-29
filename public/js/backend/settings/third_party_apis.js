document.addEventListener("DOMContentLoaded", function () {});

// jquery Validation
$(function () {
    $("form[name='thirdpartyapi']").validate({
        rules: {
            txtMapApiKeyClient: "required",
            txtMapApiKeyServer: "required",
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
