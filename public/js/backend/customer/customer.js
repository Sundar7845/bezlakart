document.addEventListener("DOMContentLoaded", function () {
    $("#tblCustomer").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "customerdata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id" },
            { data: "user_name" },
            { data: "email" },
            { data: "mobile" },
            { data: "" },
        ],
    });
});
