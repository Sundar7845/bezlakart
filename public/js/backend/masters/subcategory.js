document.addEventListener("DOMContentLoaded", function () {
    $("#tblSubCategory").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getsubcategorydata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            {
                data: "sub_category_image",
                render: function (data, type, row) {
                    return (
                        '<img src="' +
                        row.sub_category_image +
                        '" class="avatar" width="50" height="50"/>'
                    );
                },
            },
            { data: "sub_category_name" },
            { data: "main_category_name" },
            { data: "category_name" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                    style="position: relative; margin-left: 7px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkSubCategory${
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

    $("#ddlMainCategoryName").on("change", function () {
        getcategory();
    });
});

// jquery Validation
$(function () {
    $("form[name='subCategory']").validate({
        rules: {
            ddlMainCategoryName: "required",
            ddlCategoryName: "required",
            txtSubCategoryName: "required",
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
    $("#ddlMainCategoryName").val("").trigger("change");
    $("#ddlCategoryName").val("").trigger("change");
    $("#txtCategoryName").val("");
    $("#fileSubCategoryImage").val("");
    $("#previewImage").attr("src", baseurl + "/images/no-image.jpg");
    $("#btnSave").text("Save");
    $("#heading").text("Sub Category");
}

function getcategory() {
    var main_category_id = $("#ddlMainCategoryName").val();
    $.ajax({
        url: "getcategorydata",
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            main_category_id: main_category_id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (result) {
            $("#ddlCategoryName").html(
                '<option value="">Select Category Name</option>'
            );
            $.each(result.category, function (key, value) {
                $("#ddlCategoryName").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.category_name +
                        "</option>"
                );
            });
        },
    });
}

function doEdit(id) {
    $("#hdSubCategoryId").val(id);
    $("#ddlMainCategoryName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update Sub Category");
    getSubCategoryById(id);
}

function getSubCategoryById(id) {
    $.ajax({
        type: "GET",
        url: "getsubcategory/" + id,
        dataType: "json",
        success: function (data) {
            $("#ddlMainCategoryName")
                .val(data.subcategory.main_category_id)
                .trigger("change");
            setTimeout(function () {
                $("#ddlCategoryName")
                    .val(data.subcategory.category_id)
                    .trigger("change");
            }, 1000);
            $("#txtSubCategoryName").val(data.subcategory.sub_category_name);
            $("#hdSubCategoryImage").val(data.subcategory.sub_category_image);
            $("#previewImage").attr("src", data.subcategory.sub_category_image);
            $("#fileSubCategoryImage").removeAttr("required");
        },
    });
}

function showDelete(id) {
    confirmDelete(id, "subcategory/", "tblSubCategory");
}

function doStatus(id) {
    var status = $("#chkSubCategory" + id).is(":checked");
    confirmStatusChange(
        id,
        "subcategory/",
        "tblSubCategory",
        status == true ? 1 : 0,
        "chkSubCategory"
    );
}
