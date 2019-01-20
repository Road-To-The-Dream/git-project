function TotalPriceProducts() {
    $.ajax({
        url:  'http://practice/cart/GetTotalPriceProducts',
        type: "POST",
        dataType: "html",
        cache: false,
        success: function(response) {
            $('#price_all_products').html(response);
            $('.cart-container').show();
        }
    });
}

TotalPriceProducts();