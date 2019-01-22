function RemoveProduct(id) {
    $.ajax({
        url:  'http://practice/cart/removeProductForCart',
        type: "POST",
        data: "IDProduct=" + id,
        cache: false,
        success: function(response) {
            location.reload();
        }
    });
}