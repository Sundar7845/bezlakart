document.addEventListener("DOMContentLoaded", function () {
    $("#tblGoldPlan").DataTable({
        processing: true,
        serverSide: true,
        order: [[0, "ASC"]],
        ajax: "getgoldplan",
        fnRowCallback: serialNoCount,
        columns: [
            { data: "id", orderable: false },
            { data: "plan_name" },
            { data: "plan_type" },
            { data: "gold_type" },
            { data: "gold_weight" },
            { data: "plan_installment" },
            { data: "plan_amount" },
            { data: "total_plan_amount" },
            {
                data: "is_active",
                render: function (data, type, row) {
                    return `<div class="form-check form-switch form-switch-md form-switch-primary mb-3" 
                    style="position: relative; margin-left: 7px;">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkGoldPlan${
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
});

// jquery Validation
$(function () {
    $("form[name='goldplan']").validate({
        rules: {
            txtPlanName: "required",
            ddlPlanType: "required",
            txtGoldType: "required",
            txtGoldWeight: "required",
            txtPlanInstallment: "required",
            txtPlanAmount: "required",
            txtTotalPlanAmount: "required",
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
    $("#txtPlanName").val("");
    $("#ddlPlanType").val("").trigger("change");
    $("#txtGoldType").val("");
    $("#txtGoldWeight").val("");
    $("#txtPlanInstallment").val("");
    $("#txtPlanAmount").val("");
    $("#txtTotalPlanAmount").val("");
    $("#btnSave").text("Save");
    $("#heading").text("Gold Plan");
}

function doEdit(id) {
    $("#hdGoldPlanId").val(id);
    $("#txtPlanName").focus();
    $("#btnSave").text("Update");
    $("#heading").text("Update System Module");
    getGoldPlanById(id);
}

function getGoldPlanById(id) {
    $.ajax({
        type: "GET",
        url: "goldplans/" + id,
        dataType: "json",
        success: function (data) {
            $("#txtPlanName").val(data.goldplan.plan_name);
            $("#ddlPlanType").val(data.goldplan.plan_type_id);
            $("#txtGoldType").val(data.goldplan.gold_type);
            $("#txtGoldWeight").val(data.goldplan.gold_weight);
            $("#txtPlanInstallment").val(data.goldplan.plan_installment);
            $("#txtPlanAmount").val(data.goldplan.plan_amount);
            $("#txtTotalPlanAmount").val(data.goldplan.total_plan_amount);
        },
    });
}

function showDelete(id) {
    confirmDelete(id, "deletegoldplan/", "tblGoldPlan");
}

function doStatus(id) {
    var status = $("#chkGoldPlan" + id).is(":checked");
    confirmStatusChange(
        id,
        "goldplan/",
        "tblGoldPlan",
        status == true ? 1 : 0,
        "chkGoldPlan"
    );
}

function checkScore(value) {
    var installmentAmount = $("#txtPlanInstallment").val();
    var planAmount = $("#txtPlanAmount").val();
    var sumValue = parseInt(installmentAmount) * parseInt(planAmount);
    // Check if the multiplication result is 0 or NaN (error)
    if (isNaN(sumValue) || sumValue == 0) {
        sumValue = 0;
    }
    $("#txtTotalPlanAmount").val(sumValue);
}
