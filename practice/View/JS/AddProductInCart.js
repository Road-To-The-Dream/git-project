function AjaxAddInCart(id, amount_product) {
    $.ajax({
        url:  'http://practice//AddingProductsInCart',
        type: "POST",
        data: "IDProduct=" + id,
        dataType: "json",
        cache: false,
        success: function(response) {
            ShowWindow(response[0], response[1]);
            if(response[2] != "") {
                document.getElementById(amount_product).innerHTML = response[2];
            }
        }
    });
}

function ShowWindow(title, icon) {
    swal({
        title: title,
        icon: icon
    });
}