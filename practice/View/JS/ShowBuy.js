function AjaxShowBuy(id, amount_product) {
    $.ajax({
        url: 'http://practice/buy/show_buy',
        type: "POST",
        data: {"IDProduct=": id, "amount=": id},
        dataType: "json",
        cache: false,
        success: function (response) {

        }
    });
}