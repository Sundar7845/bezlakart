document.addEventListener("DOMContentLoaded", function () {
    $("#tblCity").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getcitydata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "city_name" },
            { data: "state_name" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                    style="position: relative; margin-left: 7px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkCity${
                        row.id
                    }" onclick="doStatus(${row.id});" ${
                        data == 1 ? "checked" : ""
                    }>
                </div>`;
                },
            },
        ],
    });
});

function doStatus(id) {
    var status = $("#chkCity" + id).is(":checked");
    confirmStatusChange(
        id,
        "city/",
        "tblCity",
        status == true ? 1 : 0,
        "chkCity"
    );
}
