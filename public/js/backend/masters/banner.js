document.addEventListener("DOMContentLoaded", function () {
    $("#tblBanner").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "bannerdata",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            {
                data: "banner_image",
                render: function (data, type, row) {
                    return (
                        '<img src="' +
                        row.banner_image +
                        '" class="avatar" width="300" height="120"/>'
                    );
                },
            },
            { data: "module_name" },
            { data: "banner_type" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                style="position: relative; margin-left: 7px;">
                <input class="form-check-input" type="checkbox" role="switch" id="chkBanner${
                    row.id
                }" onclick="doStatus(${row.id});" ${data == 1 ? "checked" : ""}>
            </div>`;
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
    });

    $("#ddlBannerType").on("change", function () {
        bannerType();
    });

    $("#ddlBannerLocation").on("change", function () {
        getBannerSize();
    });
});

function bannerType() {
    var banner_type_id = $("#ddlBannerType").find("option:selected").val();

    if (banner_type_id == 1) {
        $(".store_show").css("display", "block");
        $(".product_show").css("display", "none");
    } else if (banner_type_id == 2) {
        $(".product_show").css("display", "block");
        $(".store_show").css("display", "none");
    }
}

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

// jquery Validation
$(function () {
    $("form[name='banner']").validate({
        rules: {
            txtBannerName: "required",
            ddlSystemModule: "required",
            ddlBannerType: "required",
            ddlStore: "required",
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
    var baseurl = window.location.origin;
    $("#ddlSystemModule").val("").trigger("change");
    $("#ddlBannerType").val("").trigger("change");
    $("#ddlStore").val("").trigger("change");
    $("#ddlBannerLocation").val("").trigger("change");
    $("#txtBannerUrl").val("");
    $("#txtBannerName").val("");
    $("#fileBannerImage").val("");
    $("#previewImage").attr("src", baseurl + "/images/no-image.jpg");
    $("#btnSave").text("Save");
    $("#heading").text("Banner");
}

function doEdit(id) {
    $("#hdBannerId").val(id);
    $("#txtBannerName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update Banner");
    getBannerById(id);
}

function getBannerById(id) {
    $.ajax({
        type: "GET",
        url: "banner/" + id,
        dataType: "json",
        success: function (data) {
            $("#ddlSystemModule")
                .val(data.banner.system_module_id)
                .trigger("change");
            setTimeout(function () {
                $("#ddlBannerType")
                    .val(data.banner.banner_type_id)
                    .trigger("change");
            }, 1000);
            setTimeout(function () {
                $("#ddlStore").val(data.banner.store_id).trigger("change");
            }, 2000);
            setTimeout(function () {
                $("#ddlBannerLocation")
                    .val(data.banner.banner_location_id)
                    .trigger("change");
            }, 3000);
            $("#txtBannerName").val(data.banner.banner_name);
            $("#txtBannerUrl").val(data.banner.banner_url);
            $("#hdBannerImage").val(data.banner.banner_image);
            $("#previewImage").attr("src", data.banner.banner_image);
            $("#fileBannerImage").removeAttr("required");
            $("#hdHeight").val(data.banner.banner_height);
            $("#hdWidth").val(data.banner.banner_width);
            $("#banner_size").html(
                "(" +
                    data.banner.banner_width +
                    "*" +
                    data.banner.banner_height +
                    ")" +
                    "px"
            );
        },
    });
}

function getBannerSize() {
    var banner_location_id = $("#ddlBannerLocation").val();
    $.ajax({
        url: "getbannersize",
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            banner_location_id: banner_location_id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (result) {
            $("#banner_size").html(
                "(" +
                    result.bannersize.banner_width +
                    "*" +
                    result.bannersize.banner_height +
                    ")" +
                    "px"
            );
            $("#fileBannerImage").attr("width", result.bannersize.banner_width);
            $("#fileBannerImage").attr(
                "height",
                result.bannersize.banner_height
            );
            $("#hdHeight").val(result.bannersize.banner_height);
            $("#hdWidth").val(result.bannersize.banner_width);
        },
    });
}

function showDelete(id) {
    confirmDelete(id, "deletebanner/", "tblBanner");
}

function doStatus(id) {
    var status = $("#chkBanner" + id).is(":checked");
    confirmStatusChange(
        id,
        "banner/",
        "tblBanner",
        status == true ? 1 : 0,
        "chkBanner"
    );
}
