//Serial No Count
function serialNoCount(nRow, aData, iDisplayIndex) {
    var api = this.api();
    var currentPage = api.page.info().page;
    var index = currentPage * api.page.info().length + (iDisplayIndex + 1);
    $("td:first", nRow).html(index);
    return nRow;
}

//Mobile Number Field Validation
$(document).ready(function () {
    $(".mobilenumber").on("input", function () {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9]/g, "")
        );

        var mobileNumber = $(this).val();
        if (mobileNumber.length != 10 || isNaN(mobileNumber)) {
            $(this).css("border-color", "red");
        } else {
            $(this).css("border-color", "green");
        }
    });

    $("#ddlStateName").on("change", function () {
        bindCity();
    });

    $("#ddlCountryName").on("change", function () {
        bindState();
    });
});

//Check Confirmation Before Change Status
function confirmStatusChange(id, url, tblId, status, chkswitch) {
    Swal.fire({
        title:
            status == 1
                ? "Are you sure want to Activate the status?"
                : "Are you sure want to DeActivate the status?",
        text: "You can able to revert this!",
        icon: status == 1 ? "warning" : "error",
        showCancelButton: true,
        confirmButtonText:
            status == 1 ? "Yes, Activate it!" : "Yes, DeActivate it!",
        customClass: {
            confirmButton: "btn btn-success me-3",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            statusUpdate(id, url, status);
            Swal.fire({
                icon: "success",
                title: status == 0 ? "DeActivated!" : "Activated!",
                text:
                    status == 0
                        ? "Your file has been deactivated."
                        : "Your file has been activated.",
                customClass: {
                    confirmButton: "btn btn-success",
                },
            });
        } else {
            $("#" + chkswitch + id).prop("checked", status == 1 ? false : true);
        }
        refreshDatatable(tblId);
    });
}

//Change Status
function statusUpdate(id, url, status) {
    $.ajax({
        type: "POST",
        url: url + id + "/" + status,
        data: {
            status: status,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (data) {
            return true;
        },
    });
}

//Check Confirmation Before Delete
function confirmDelete(id, url, tblId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "error",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        customClass: {
            confirmButton: "btn btn-success me-3",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            doDelete(id, url, tblId);
        }
    });
}

//Delete Data
function doDelete(id, url, tblId) {
    $.ajax({
        type: "GET",
        url: url + id,
        dataType: "json",
        success: function (data) {
            if (data.responseData.alert == "error") {
                Swal.fire({
                    title: "You won't be able to delete this!",
                    text: "This is referred in some other instance!",
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    buttonsStyling: false,
                });
            } else {
                Swal.fire({
                    icon: "success",
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    customClass: {
                        confirmButton: "btn btn-success",
                    },
                });
            }
            refreshDatatable(tblId);
        },
    });
}

//Refresh DataTable After Actions/Functions Called
function refreshDatatable(tblId) {
    $("#" + tblId)
        .DataTable()
        .ajax.reload();
}

//Number Validate
$(".numvalidate").keypress(function (e) {
    var charCode = e.which ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
});

function bindState() {
    var country_id = $("#ddlCountryName").val();
    $.ajax({
        url: "getstates",
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            country_id: country_id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (result) {
            $("#ddlStateName").html('<option value="">Select State</option>');
            $.each(result, function (key, value) {
                $("#ddlStateName").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.state_name +
                        "</option>"
                );
            });
        },
    });
}

function bindCity() {
    var state_id = $("#ddlStateName").val();
    $.ajax({
        url: "getcities",
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            state_id: state_id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (result) {
            $("#ddlCityName").html('<option value="">Select City</option>');
            $.each(result, function (key, value) {
                $("#ddlCityName").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.city_name +
                        "</option>"
                );
            });
        },
    });
}

//forntend password show & hide
$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

//backend password show & hide
$(".toggle").click(function () {
    $(this).toggleClass("ri-eye-off-fill");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

function quickView(id) {
    var product_image = "";
    var product_thumb = "";
    $.ajax({
        type: "GET",
        url: "/quickview/data/" + id, // Make sure the URL is correct
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data.productdetails, function (index, product) {
                product_image += `
                    <div class="swiper-slide">
                        <figure class="product-image">
                            <img src="${product.product_image}" id="productimage_main"
                                data-zoom-image="${product.product_image}"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                    </div>`;

                product_thumb += `
                    <div class="product-thumb swiper-slide">
                        <img src="${product.product_image}" alt="Product Thumb"
                            width="103" height="116">
                    </div>`;
            });
            $("#quickviewpopup").append(product_image);
            $("#quickviewone").append(product_thumb);
            $('#product_name').text(data.productdetails[0].product_name);
            $('#category_name').text(data.productdetails[0].main_category_name);
            $('#product_price').text("₹"+data.productdetails[0].product_price);
            $('#product_brand').attr("src", data.productdetails[0].brand_image);
            
            // Initialize Swiper sliders
            new Swiper(".product-single-swiper", {
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });

            new Swiper(".product-thumbs-wrap", {
                slidesPerView: 4,
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        },
    });
}
