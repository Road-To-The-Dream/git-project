function AjaxAddInCart(id, amount_product) {
    $.ajax({
        url:  'http://practice/cart/AddingProductsInCart',
        type: "POST",
        data: "IDProduct=" + id,
        dataType: "json",
        cache: false,
        success: function(response) {
            ShowWindowAddComment(response[0], response[1]);
            if(response[2] != "") {
                document.getElementById(amount_product).innerHTML = response[2];
            }
        }
    });
}

function ShowWindowAddComment(title, icon) {
    swal({
        title: title,
        icon: icon
    });
}