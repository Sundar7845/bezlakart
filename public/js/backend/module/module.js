document.addEventListener("DOMContentLoaded", function () {
    $("#tblModule").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getmodules",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            {
                data: "module_image",
                render: function (data, type, row) {
                    return (
                        '<img src="' +
                        row.module_image +
                        '" class="avatar" width="50" height="50"/>'
                    );
                },
            },
            { data: "module_name" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                    style="position: relative; margin-left: 7px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkModule${
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

//Preview Image
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

function cancel() {
    var baseurl = window.location.origin;
    $("#txtModuleName").val("");
    $("#fileModuleImage").val("");
    $("#previewImage").attr("src", baseurl + "/images/no-image.jpg");
    $("#btnSave").text("Save");
    $("#heading").text("System Module");
}

// jquery Validation
$(function () {
    $("form[name='module']").validate({
        rules: {
            txtModuleName: "required",
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
    $("#hdModuleId").val(id);
    $("#txtModuleName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update System Module");
    getModuleById(id);
}

function getModuleById(id) {
    $.ajax({
        type: "GET",
        url: "getmodule/" + id,
        dataType: "json",
        success: function (data) {
            $("#txtModuleName").val(data.module.module_name);
            $("#hdModuleImage").val(data.module.module_image);
            $("#previewImage").attr("src", data.module.module_image);
            $("#fileModuleImage").removeAttr("required");
        },
    });
}

function showDelete(id) {
    confirmDelete(id, "deletemodule/", "tblModule");
}

function doStatus(id) {
    var status = $("#chkModule" + id).is(":checked");
    confirmStatusChange(
        id,
        "module/",
        "tblModule",
        status == true ? 1 : 0,
        "chkModule"
    );
}
