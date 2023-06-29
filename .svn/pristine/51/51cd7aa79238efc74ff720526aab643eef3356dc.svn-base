// jquery Validation
$(function () {
    $("form[name='mail']").validate({
        rules: {
            txtMailerName: "required",
            txtHost: "required",
            txtDriver: "required",
            txtPort: "required",
            txtUsername: "required",
            txtemail: "required",
            txtEncryption: "required",
            txtPassword: "required",
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
