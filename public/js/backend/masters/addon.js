document.addEventListener("DOMContentLoaded", function () {
    $("#tblAddon").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getaddon",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "addon_name" },
            { data: "store_name" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                style="position: relative; margin-left: 7px;">
                <input class="form-check-input" type="checkbox" role="switch" id="chkAddon${
                    row.id
                }" onclick="doStatus(${row.id});" ${data == 1 ? "checked" : ""}>
            </div>`;
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
    });
});

// jquery Validation
$(function () {
    $("form[name='addon']").validate({
        rules: {
            ddlStore: "required",
            txtAddonName: "required",
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
    $("#ddlStore").val("").trigger("change");
    $("#txtAddonName").val("");
    $("#heading").text("Brand");
    $("#btnSave").text("Save");
}

function doEdit(id) {
    $("#hdAddonId").val(id);
    $("#txtAddonName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update Attribute");
    getAddonById(id);
}

function getAddonById(id) {
    $.ajax({
        type: "GET",
        url: "addon/" + id,
        dataType: "json",
        success: function (data) {
            $("#txtAddonName").val(data.addon.addon_name);
            $("#ddlStore").val(data.addon.store_id).trigger("change");
        },
    });
}

function showDelete(id) {
    confirmDelete(id, "deleteaddon/", "tblAddon");
}

function doStatus(id) {
    var status = $("#chkAddon" + id).is(":checked");
    confirmStatusChange(
        id,
        "addon/",
        "tblAddon",
        status == true ? 1 : 0,
        "chkAddon"
    );
}
