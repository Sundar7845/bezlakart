window.addEventListener("DOMContentLoaded", function () {
    $("#tblProductList").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "productdata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id" },
            {
                data: "product_image",
                orderable: false,
                render: function (data, type, row) {
                    return (
                        '<img src="' +
                        row.product_image +
                        '" class="avatar" width="50" height="50"/>'
                    );
                },
            },
            { data: "category_name" },
            { data: "store_name" },
            { data: "product_price" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                style="position: relative; margin-left: 7px;">
                <input class="form-check-input" type="checkbox" role="switch" id="chkProduct${
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
    confirmDelete(id, "deleteproduct/", "tblProductList");
}

function doStatus(id) {
    var status = $("#chkProduct" + id).is(":checked");
    confirmStatusChange(
        id,
        "product/",
        "tblProductList",
        status == true ? 1 : 0,
        "chkProduct"
    );
}
