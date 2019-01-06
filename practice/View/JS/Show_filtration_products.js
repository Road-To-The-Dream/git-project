function AjaxFiltrationProducts(message1) {
    $.ajax({
        url:     'http://practice//correct',
        type:     "POST",
        dataType: "json",
        data: $("#formFiltration").serialize(),
        cache: false,
        beforeSend : function() {
            document.getElementById(message1).innerHTML = "Ожидание данных...";
        },
        success: function(response) {
            var i = 0;
            var str = "message" + (i+1);
            alert(str);
            document.getElementById(str).innerHTML = response[i];
        },
        error: function(response) {
            document.getElementById(message1).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
        }
    });
}