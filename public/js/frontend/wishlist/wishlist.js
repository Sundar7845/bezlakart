function wishlist(id) {
    var product_id = id;
    $.ajax({
        type: "GET",
        url: "/wishlists/product",
        data: {
            product_id: product_id,
        },
        dataType: "json",
        success: function (data, textStatus, xhr) {
            if (data.response.alert == "success") {
                toastr.success(data.response.message);
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                };
            } else {
                toastr.error(data.response.message);
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                };
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            if (xhr.status === 401) {
                toastr.error("Please Login First");
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                };
            }
        },
    });
}
