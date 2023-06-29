//Load Roles In DataTable
document.addEventListener("DOMContentLoaded", function () {
    $("#tblRolesList").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getrolesdata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "role_name" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" style="position: relative; margin-left: 7px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkRole${
                        row.id
                    }" name="chkRole" onclick="changeStatus(${row.id});" ${
                        data == 1 ? "checked" : ""
                    } ' />
                </div>`;
                },
            },
            { data: "action", orderable: false },
        ],
    });
});

//Update Status
function changeStatus(id) {
    var status = $("#chkRole" + id).is(":checked");
    confirmStatusChange(
        id,
        "changestatus/",
        "tblRolesList",
        status == true ? 1 : 0,
        "chkRole"
    );
}

//Edit Data
function doEdit(id) {
    $("#hdRoleId").val(id);
    $("#txtRoleName").focus();
    $("#heading").text("Update Role");
    $("#btnSave").text("Update");
    getRoleById(id);
}

//Get Role By ID
function getRoleById(id) {
    $.ajax({
        type: "GET",
        url: "getrole/" + id,
        dataType: "json",
        success: function (data) {
            $("#txtRoleName").val(data.roles.role_name);
        },
    });
}

//Form Cancel
function cancel() {
    $("#heading").text("Roles");
    $("#hdRoleId").val("");
    $("#txtRoleName").val("");
    $("#txtRoleName").focus();
    $("#btnSave").text("Save");
}

//Delete Data
function showDelete(id) {
    confirmDelete(id, "delete/role/", "tblRolesList");
}

// jquery Validation
$(function () {
    $("form[name='roles']").validate({
        rules: {
            txtRoleName: "required",
        },
    });
});
