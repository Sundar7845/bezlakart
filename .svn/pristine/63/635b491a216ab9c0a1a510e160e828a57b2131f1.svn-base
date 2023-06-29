document.addEventListener("DOMContentLoaded", function () {
    $("#tblAttribute").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getattribute",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "attribute_name" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                style="position: relative; margin-left: 7px;">
                <input class="form-check-input" type="checkbox" role="switch" id="chkAttribute${
                    row.id
                }" onclick="doStatus(${row.id});" ${data == 1 ? "checked" : ""}>
            </div>`;
                },
            },
            { data: "action", orderable: false , searchable: false},
        ],
    });
});

// jquery Validation
$(function () {
    $("form[name='attribute']").validate({
        rules: {
            txtAttributeName: "required",
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
    $("#txtAttributeName").val("");
}

function doEdit(id) {
    $("#hdAttributeId").val(id);
    $("#txtAttributeName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update Attribute");
    getAttributeById(id);
}

function getAttributeById(id) {
    $.ajax({
        type: "GET",
        url: "attribute/" + id,
        dataType: "json",
        success: function (data) {
            $("#txtAttributeName").val(data.attribute.attribute_name);
        },
    });
}

function showDelete(id) {
    confirmDelete(id, "attribute/", "tblAttribute");
}

function doStatus(id) {
    var status = $("#chkAttribute" + id).is(":checked");
    confirmStatusChange(
        id,
        "attribute/",
        "tblAttribute",
        status == true ? 1 : 0,
        "chkAttribute"
    );
}
