function RemoveProduct(id) {
    $.ajax({
        url:  'http://practice/cart/RemoveProductForCart',
        type: "POST",
        data: "IDProduct=" + id,
        cache: false,
        success: function(response) {
            location.reload();
        }
    });
}