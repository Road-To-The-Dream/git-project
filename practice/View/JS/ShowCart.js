function AjaxShowCart() {
    $.ajax({
        url:  'http://practice/cart/checkProductInCart',
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(response) {
            if (response['icon'] == 'error') {
                swal({
                    title: response['message'],
                    icon:  response['icon']
                })
            } else {
                location.href = 'http://practice/cart';
            }
        }
    });
}