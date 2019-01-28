function AjaxFiltrationProducts(message1) {
    $.ajax({
        url: 'http://practice/catalog/index',
        type: "POST",
        dataType: "html",
        data: $("#formFiltration").serialize(),
        cache: false,
        beforeSend: function () {
            document.getElementById(message1).innerHTML = "Ожидание данных...";
        },
        success: function (response) {
            // if (response == "empty") {
            //     location.href = "catalog";
            // }
            // var i = 0;
            // var str = "message" + (i + 1);
            // alert(str);
            // document.getElementById(str).innerHTML = response[i];
            // location.reload();
        },
        error: function (response) {
            document.getElementById(message1).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
        }
    });
}