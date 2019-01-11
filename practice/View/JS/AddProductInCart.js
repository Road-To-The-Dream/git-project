function AjaxAddInCart(id) {
    $.ajax({
        url:     'http://practice//CHeckSessionAndAddProductInCart',
        type:     "POST",
        data: "IDProduct=" + id,
        dataType: "html",
        cache: false,
        success: function(response) {
            alert(response);
            if(response == 'error') {
                swal({
                    title: "Для добавления в корзину требуется войти в аккаунт!",
                    icon: "error",
                    button: "OK"
                });
            } else {
                if(response == 'succes') {
                    alert(response);
                    swal({
                        title: "Товар добавлен в корзину !",
                        icon: "success",
                        button: "OK"
                    });
                }
            }
        }
    });
}