document.addEventListener("DOMContentLoaded", function () {
    

});

// jquery Validation
$(function () {
    $("form[name='notificationsetup']").validate({
        rules: {
            txtpush_notification_key: "required",
            txtfcm_project_id: "required",
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