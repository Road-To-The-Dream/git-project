function RemoveProduct(id) {
    $.ajax({
        url:  'http://practice/cart/removeProductForCart',
        type: "POST",
        data: "IDProduct=" + id,
        dataType: 'html',
        cache: false,
        success: function(response) {
            if(response == 'empty') {
                location.href = 'http://practice/catalog';
            } else {
                location.reload();
            }
        }
    });
}