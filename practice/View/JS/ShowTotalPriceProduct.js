function AjaxCountTotalPriceProduct(btn_value, id_product, amount, price_product, total_price_product, price_all_products) {
    $.ajax({
        url: 'http://practice/cart/countTotalPriceProduct',
        type: "POST",
        data: {
            "btn_value": btn_value,
            "IDProduct": id_product,
            "amount_units": $('#' + amount).val(),
            "price_product": document.getElementById(price_product).textContent,
            "total_price_product": document.getElementById(total_price_product).textContent,
            "price_all_products": document.getElementById(price_all_products).textContent
        },
        dataType: "json",
        cache: false,
        success: function (response) {
            $('#price_product').val(response[1]);
            $('#' + amount).val(response[0]);
            document.getElementById(total_price_product).innerHTML = response[1];
            document.getElementById(price_all_products).innerHTML = response[2];
        }
    });
}