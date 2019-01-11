function AjaxAddInCart() {
    $.ajax({
        url:     'http://practice//CHeckSessionAndAddProductInCart',
        type:     "POST",
        dataType: "html",
        cache: false,
        success: function(response) {
            if(!response) {
                swal({
                    title: "Вход в аккаунт выполнен !",
                    text: "Приятных покупок.",
                    icon: "success",
                    button: "OK"
                }).then(function() {
                    location.href = "http://practice/main/show_main"
                });
            }
        }
    });
}