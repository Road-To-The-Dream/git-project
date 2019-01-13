function RemoveProduct(id) {
    $.ajax({
        url:  'http://practice//RemoveProductForCart',
        type: "POST",
        data: "IDProduct=" + id,
        cache: false,
        success: function(response) {
            location.href = "http://practice/cart/show_product_cart";
        }
    });
}