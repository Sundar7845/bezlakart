document.addEventListener("DOMContentLoaded", function () {
    $("#tblSocialMedia").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "socialmediadata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "social_media_name" },
            { data: "social_media_url" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                    style="position: relative; margin-left: 7px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkSocailMedia${
                        row.id
                    }" onclick="doStatus(${row.id});" ${
                        data == 1 ? "checked" : ""
                    }>
                </div>`;
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
    });
});

// jquery Validation
$(function () {
    $("form[name='socialmedia']").validate({
        rules: {
            ddlSocialMedia: "required",
            txtSocialMediaUrl: "required",
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
    $("#ddlSocialMedia").val("").trigger("change");
    $("#txtSocialMediaUrl").val("");
    $("#btnSave").text("Save");
    $("#heading").text("System Module");
}

function doEdit(id) {
    $("#hdSocialMediaId").val(id);
    $("#ddlSocialMedia").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update Social Media");
    getSocialMediaById(id);
}

function getSocialMediaById(id) {
    $.ajax({
        type: "GET",
        url: "getsocialmedia/" + id,
        dataType: "json",
        success: function (data) {
            $("#ddlSocialMedia").val(data.socialmedia.social_media_id);
            $("#txtSocialMediaUrl").val(data.socialmedia.social_media_url);
        },
    });
}

function doStatus(id) {
    var status = $("#chkSocailMedia" + id).is(":checked");
    confirmStatusChange(
        id,
        "socialmedia/",
        "tblSocialMedia",
        status == true ? 1 : 0,
        "chkSocailMedia"
    );
}
