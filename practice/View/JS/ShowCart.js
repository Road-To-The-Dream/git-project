function AjaxShowCart() {
    $.ajax({
        url:  'http://practice/cart/CheckProductInCart',
        type: "POST",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        cache: false,
        success: function(response) {

        },
        error: function (response) {
            alert(response[0]);
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