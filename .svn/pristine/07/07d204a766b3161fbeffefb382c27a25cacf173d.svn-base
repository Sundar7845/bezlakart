document.addEventListener("DOMContentLoaded", function () {
    
        ClassicEditor.create(document.querySelector("#ckeditor-classic"))
            .then(function (e) {
                e.ui.view.editable.element.style.height = "200px";
            })
            .catch(function (e) {
                console.error(e);
            });
});

// jquery Validation
$(function () {
    $("form[name='privacypolicy']").validate({
        rules: {
            txtPrivacyandPolicy: "required",
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
