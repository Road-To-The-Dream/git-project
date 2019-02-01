function AjaxModalButtonBuy(id_product) {
    $.ajax({
        url: 'http://practice/orders/modalButtonBuy',
        type: "POST",
        data: {
            "IDProduct": id_product
        },
        dataType: "json",
        cache: false,
        success: function () {
        }
    });
}