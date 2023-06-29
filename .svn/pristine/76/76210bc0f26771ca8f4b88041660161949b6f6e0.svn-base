document.addEventListener("DOMContentLoaded", function () {
    $("#tblStoreList").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "storedata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            {
                data: "logo",
                render: function (data, type, row) {
                    return (
                        '<img src="' +
                        row.logo +
                        '" class="avatar" width="50" height="50"/>'
                    );
                },
            },
            { data: "module_name" },
            { data: "first_name" },
            { data: "mobile" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                style="position: relative; margin-left: 7px;">
                <input class="form-check-input" type="checkbox" role="switch" id="chkStore${
                    row.id
                }" onclick="doStatus(${row.id});" ${data == 1 ? "checked" : ""}>
            </div>`;
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
    });
});

function showDelete(id) {
    confirmDelete(id, "deletestore/", "tblStoreList");
}

function doStatus(id) {
    var status = $("#chkStore" + id).is(":checked");
    confirmStatusChange(
        id,
        "store/",
        "tblStoreList",
        status == true ? 1 : 0,
        "chkStore"
    );
}
