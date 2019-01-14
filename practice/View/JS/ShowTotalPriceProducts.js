function TotalPriceProducts(price_all_products) {
    $.ajax({
        url:  'http://practice//GetTotalPriceProducts',
        type: "POST",
        dataType: "html",
        cache: false,
        success: function(response) {
            document.getElementById(price_all_products).innerHTML = response;
        }
    });
}