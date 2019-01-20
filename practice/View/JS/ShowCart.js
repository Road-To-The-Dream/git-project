function AjaxShowCart() {
    $.ajax({
        url:  'http://practice/cart/CheckProductInCart',
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(response) {
            alert(response);
            ShowWindowCart(response[0], response[1]);
        }
    });
}

function ShowWindowCart(title, icon) {
    swal({
        title: title,
        icon: icon
    }).then(function() {
        if(icon == 'success') {
            location.href = "http://practice/cart"
        }
    });
}