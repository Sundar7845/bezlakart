$(document).ready(function () {});


var currency = $("#currency").val();
var baseurl = window.location.origin;
var brand = [];
var productpage = "";
function getbrand(id) {
    $("#pageloader").fadeIn();
    var min_price = $("#min_price").val() == "" ? null : $("#min_price").val();
    var max_price = $("#max_price").val() == "" ? null : $("#max_price").val();

    if ($("#chkBrandName" + id).is(":checked")) {
        brand.push(id);
    } else {
        var index = brand.indexOf(id);
        if (index > -1) {
            brand.splice(index, 1);
        }
    }
    console.log(brand);
    $("#product_page").empty();
    $.ajax({
        type: "GET",
        url: "/getbrandwise/product",
        data: {
            brand: brand,
            min_price: min_price,
            max_price: max_price,
        },
        dataType: "json",
        success: function (data) {
            $("#pageloader").fadeOut();
            if (data.brandwiseproducts.length == 0) {
                var notfound = `<img src=${baseurl}/images/no_result.gif>`;
                $("#notfound").append(notfound);
            } else {
                $("#notfound").empty();
                $.each(data.brandwiseproducts, function (key, value) {
                    var productHTML = `<div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ url('/products/detail/' . ${value.id} }}">
                                    <img src="${baseurl}/${value.product_image}" alt="Product" id="product_image"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        onclick="quickView('<?php echo $product->id; ?>');"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <a href="#">${value.main_category_name}</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="#">${value.product_name}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="" class="rating-reviews">(3 reviews)</a>
                                </div>
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                    ${currency}${value.product_price}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $("#product_page").append(productHTML);
                });
            }
        },
    });
}
