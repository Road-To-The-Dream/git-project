function AjaxDecreaseAmount(btn_value, id_product, amount, price) {
    $.ajax({
        url: 'http://practice/cart/countTotalPriceProduct',
        type: "POST",
        data: {
            "btn_value": btn_value,
            "IDProduct": id_product,
            "amount_units": $('#' + amount).val(),
            "price_product": document.getElementById(price).textContent,
            "total_price_product": '0',
            "price_all_products": '0'
        },
        dataType: "json",
        cache: false,
        success: function (response) {
            $('#' + amount).val(response[0]);
        }
    });
}