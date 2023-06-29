document.addEventListener("DOMContentLoaded", function () {
    $("#tblCountry").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getcountriesdata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "country_code" },
            { data: "country_name" },
            {
                data: "is_active",
                render: function (data, type, row) {console.log(data);
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                    style="position: relative; margin-left: 7px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkCountry${
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
    var status = $("#chkCountry" + id).is(":checked");
    confirmStatusChange(
        id,
        "country/",
        "tblCountry",
        status == true ? 1 : 0,
        "chkCountry"
    );
}
