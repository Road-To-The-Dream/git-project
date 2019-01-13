function TotalPriceProducts(id) {
    $.ajax({
        url:  'http://practice//GetTotalPriceProducts',
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(response) {
            document.getElementById(id).innerHTML = response;
        }
    });
}