$(document).ready(function(){
   
});

//validation
$(function () {
    $("form[name='storeregister']").validate({
        rules: {
            txtname: "required",
            txtshopname: "required",
            txtphone: "required",
            txtemail: "required",
            txtpassword: "required",
            password_confirmation: {
                required: true,
                equalTo: "#password-field",
            },
            txtbank_name: "required",
            txtholdername: "required",
            txtaccountnumber: "required",
            txtifsccode: "required",
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