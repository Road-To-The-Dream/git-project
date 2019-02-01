function AjaxModalButtonClose(id_product, amount) {
    $.ajax({
        url: 'http://practice/orders/modalButtonClose',
        type: "POST",
        data: {
            "IDProduct": id_product,
            "Amount": $('#' + amount).val()
        },
        dataType: "html",
        cache: false,
        success: function () {
            $('#' + amount).val('1')
        }
    });
}