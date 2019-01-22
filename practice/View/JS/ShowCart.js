function AjaxShowCart() {
    $.ajax({
        url:  'http://practice/cart/checkProductInCart',
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(response) {
            alert(response);
        },
        error: function (response) {
            alert("sdfsdf");
            alert(response[0]);
        }
    });
}