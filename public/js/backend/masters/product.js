window.addEventListener("DOMContentLoaded", function () {
    (itemid = $("#hdProductId").val()),
        ClassicEditor.create(document.querySelector("#ckeditor-classic"))
            .then(function (e) {
                e.ui.view.editable.element.style.height = "200px";
            })
            .catch(function (e) {
                console.error(e);
            });
    // var dropzonePreviewNode = document.querySelector("#dropzone-preview-list"),
    //     previewTemplate =
    //         ((dropzonePreviewNode.itemid = ""),
    //         dropzonePreviewNode.parentNode.innerHTML),
    //     dropzone =
    //         (dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode),
    //         new Dropzone(".dropzone", {
    //             url: "https://httpbin.org/post",
    //             method: "post",
    //             previewTemplate: previewTemplate,
    //             previewsContainer: "#dropzone-preview",
    //         }));
    !(function () {
        "use strict";
        var e = document.querySelectorAll(".needs-validation"),
            l = new Date().toUTCString().slice(5, 16);
        function p() {
            var e = 12 <= new Date().getHours() ? "PM" : "AM",
                t =
                    12 < new Date().getHours()
                        ? new Date().getHours() % 12
                        : new Date().getHours(),
                o =
                    new Date().getMinutes() < 10
                        ? "0" + new Date().getMinutes()
                        : new Date().getMinutes();
            return t < 10 ? "0" + t + ":" + o + " " + e : t + ":" + o + " " + e;
        }
        setInterval(p, 1e3),
            document
                .querySelector("#product-image-input")
                .addEventListener("change", function () {
                    var e = document.querySelector("#product-img"),
                        t = document.querySelector("#product-image-input")
                            .files[0],
                        o = new FileReader();
                    o.addEventListener(
                        "load",
                        function () {
                            e.src = o.result;
                        },
                        !1
                    ),
                        t && o.readAsDataURL(t);
                });
        var m = new Choices("#choices-category-input", { searchEnabled: !1 }),
            g = sessionStorage.getItem("editInputValue");
        g &&
            ((g = JSON.parse(g)),
            (document.getElementById("formAction").value = "edit"),
            (document.getElementById("product-id-input").value = g.id),
            (document.getElementById("product-img").src = g.product.img),
            (document.getElementById("product-title-input").value =
                g.product.title),
            (document.getElementById("stocks-input").value = g.stock),
            (document.getElementById("product-price-input").value = g.price),
            (document.getElementById("orders-input").value = g.orders),
            m.setChoiceByValue(g.product.category)),
            Array.prototype.slice.call(e).forEach(function (s) {
                s.addEventListener(
                    "submit",
                    function (e) {
                        var t, o, i, n, r, u, d, c, a;
                        if (s.checkValidity())
                            return (
                                e.preventDefault(),
                                (c = ++itemid),
                                (t = document.getElementById(
                                    "product-title-input"
                                ).value),
                                (o = m.getValue(!0)),
                                (i =
                                    document.getElementById(
                                        "stocks-input"
                                    ).value),
                                (n =
                                    document.getElementById(
                                        "orders-input"
                                    ).value),
                                (r = document.getElementById(
                                    "product-price-input"
                                ).value),
                                (u =
                                    document.getElementById("product-img").src),
                                "add" ==
                                (d =
                                    document.getElementById("formAction").value)
                                    ? ((c =
                                          null !=
                                          sessionStorage.getItem("inputValue")
                                              ? ((a = JSON.parse(
                                                    sessionStorage.getItem(
                                                        "inputValue"
                                                    )
                                                )),
                                                {
                                                    id: c + 1,
                                                    product: {
                                                        img: u,
                                                        title: t,
                                                        category: o,
                                                    },
                                                    stock: i,
                                                    price: r,
                                                    orders: n,
                                                    rating: "--",
                                                    published: {
                                                        publishDate: l,
                                                        publishTime: p(),
                                                    },
                                                })
                                              : ((a = []),
                                                {
                                                    id: c,
                                                    product: {
                                                        img: u,
                                                        title: t,
                                                        category: o,
                                                    },
                                                    stock: i,
                                                    price: r,
                                                    orders: n,
                                                    rating: "--",
                                                    published: {
                                                        publishDate: l,
                                                        publishTime: p(),
                                                    },
                                                })),
                                      a.push(c),
                                      sessionStorage.setItem(
                                          "inputValue",
                                          JSON.stringify(a)
                                      ))
                                    : "edit" == d
                                    ? ((c =
                                          document.getElementById(
                                              "product-id-input"
                                          ).value),
                                      sessionStorage.getItem(
                                          "editInputValue"
                                      ) &&
                                          ((a = {
                                              id: parseInt(c),
                                              product: {
                                                  img: u,
                                                  title: t,
                                                  category: o,
                                              },
                                              stock: i,
                                              price: r,
                                              orders: n,
                                              rating: g.rating,
                                              published: {
                                                  publishDate: l,
                                                  publishTime: p(),
                                              },
                                          }),
                                          sessionStorage.setItem(
                                              "editInputValue",
                                              JSON.stringify(a)
                                          )))
                                    : console.log("Form Action Not Found."),
                                window.location.replace(
                                    "apps-ecommerce-products.html"
                                ),
                                !1
                            );
                        e.preventDefault(),
                            e.stopPropagation(),
                            s.classList.add("was-validated");
                    },
                    !1
                );
            });
    })();
    attribute();
});

document.addEventListener("DOMContentLoaded", function () {
    $("#ddlMainCategory").on("change", function () {
        getcategory();
    });
    $("#ddlCategory").on("change", function () {
        getSubCategory();
    });
    ImgUpload();
});

// function attribute() {
//     $("#choice_attributes").on("change", function () {
//         // if (module_id == 0) {
//         //     toastr.error("Please select a module!", {
//         //         CloseButton: true,
//         //         ProgressBar: true,
//         //     });
//         //     $(this).val("");
//         //     return false;
//         // }
//         $("#customer_choice_options").html(null);
//         $.each($("#choice_attributes option:selected"), function () {
//             if ($(this).val().length > 50) {
//                 toastr.error(
//                     "The Variation must not be greater than 50 characters.",
//                     {
//                         CloseButton: true,
//                         ProgressBar: true,
//                     }
//                 );
//                 return false;
//             }
//             add_more_customer_choice_option($(this).val(), $(this).text());
//         });
//     });
// }

// function add_more_customer_choice_option(i, name) {
//     let n = name;
//     $("#customer_choice_options").append(
//         '<div class="row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="' +
//             i +
//             '"><input type="text" class="form-control" name="choice[]" value="' +
//             n +
//             '" placeholder="Choice Title" readonly></div><div class="col-lg-9"><input type="text" class="form-control" name="choice_options_' +
//             i +
//             '[]" placeholder="Enter choice values" data-role="tagsinput" onchange="combination_update()"></div></div>'
//     );
//     $(
//         "input[data-role=tagsinput], select[multiple][data-role=tagsinput]"
//     ).tagsinput();
// }

// function combination_update() {
//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//     });

//     $.ajax({
//         type: "POST",
//         url: "https://develop.keeggi.in/admin/item/variant-combination",
//         data: $("#item_form").serialize() + "&stock=" + stock,
//         beforeSend: function () {
//             $("#loading").show();
//         },
//         success: function (data) {
//             $("#loading").hide();
//             $("#variant_combination").html(data.view);
//             if (data.length < 1) {
//                 $('input[name="current_stock"]').attr("readonly", false);
//             }
//         },
//     });
// }

function getcategory() {
    var main_category_id = $("#ddlMainCategory").val();
    $.ajax({
        url: "getcategories",
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
            $("#ddlCategory").html(
                '<option value="">Select Category Name</option>'
            );
            $.each(result.category, function (key, value) {
                $("#ddlCategory").append(
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

function getSubCategory() {
    var main_category_id = $("#ddlMainCategory").val();
    var category_id = $("#ddlCategory").val();
    $.ajax({
        url: "getcategories",
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            main_category_id: main_category_id,
            category_id: category_id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (result) {
            $("#ddlSubCategory").html(
                '<option value="">Select Sub Category Name</option>'
            );
            $.each(result.subCategory, function (key, value) {
                $("#ddlSubCategory").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.sub_category_name +
                        "</option>"
                );
            });
        },
    });
}

// jquery Validation
$(function () {
    $("form[name='product']").validate({
        rules: {
            txtProductName: "required",
            txtProductDescription: "required",
            fileProductImage: "required",
            ddlStoreName: "required",
            ddlBrandName: "required",
            txtStocks: "required",
            txtPrice: "required",
            txtCommissionAmt: "required",
            ddlMainCategory: "required",
            ddlCategory: "required",
            ddlSubCategory: "required",
            ddlSystemModule: "required",
            txtProductTag: "required",
            txtShortDescription: "required",
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
    $("#ddlStoreName").val("").trigger("change");
    $("#ddlBrandName").val("").trigger("change");
    $("#ddlDiscount").val("").trigger("change");
    $("#ddlMainCategory").val("").trigger("change");
    $("#ddlCategory").val("").trigger("change");
    $("#ddlSubCategory").val("").trigger("change");
    $("#ddlSystemModule").val("").trigger("change");
    $("#txtProductName").val("");
    $("#txtProductDescription").val("");
    $("#txtStocks").val("");
    $("#txtPrice").val("");
    $("#txtDiscount").val("");
    $("#txtCommissionAmt").val("");
    $("#txtMetaTitle").val("");
    $("#txtMetaKeywords").val("");
    $("#txtMetaDescription").val("");
    $("#txtProductTag").val("");
    $("#txtShortDescription").val("");
    $("#fileProductImage").val("");
    $("#product-img").attr("src", baseurl + "/images/no-image.jpg");
    $("#delete").click();
}

function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $(".upload__inputfile").each(function () {
        $(this).on("change", function (e) {
            imgWrap = $(this).closest(".upload__box").find(".upload__img-wrap");
            var maxLength = $(this).attr("data-max_length");

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {
                if (!f.type.match("image.*")) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false;
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var html =
                                "<div class='upload__img-box'><div style='background-image: url(" +
                                e.target.result +
                                ")' data-number='" +
                                $(".upload__img-close").length +
                                "' data-file='" +
                                f.name +
                                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        };
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $("body").on("click", ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}

function deleteimg(id) {
    $.ajax({
        url: "/productmultiimgdelete/" + id,
        type: "GET",
        // headers: {
        //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        // },
        dataType: "json",
        success: function (response) {
            console.log(response);
        },
    });
}
