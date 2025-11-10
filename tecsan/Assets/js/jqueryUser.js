$(document).ready(function () {

    // var btn_credit = $("#credit");

    // btn_credit.on('click', function () {
    //     $("#credit-fields").removeClass("d-none");
    // });

    // var btn_cash = $("#cash");

    // btn_cash.on('click', function () {
    //     $("#credit-fields").addClass("d-none");
    // });

    // var btn_paypal = $("#paypal");

    // btn_paypal.on('click', function () {
    //     $("#credit-fields").addClass("d-none");
    // });


    // var btn_delivery = $("#delivery");

    $("input[name=paymentMethod]").on('click', function () {
        let value = $(this).val()

        console.log(value)

        if (value == 'credit') {
            $("#credit-fields").removeClass("d-none");
            $input.attr("required");
        } else {
            $("#credit-fields").addClass("d-none");
        }
    })


    $("input[name=deliveryMethod]").on('click', function () {
        let value = $(this).val()

        console.log(value)

        if (value == 'same-address') {
            $("#address-fields").removeClass("d-none");
            $input.attr("required");
        } else {
            $("#address-fields").addClass("d-none");
        }
    })

});