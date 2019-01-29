function AjaxFormLogin(message1, message2, message3) {
    $.ajax({
        url: 'http://practice/main/validateIsLogin',
        type: "POST",
        dataType: "json",
        data: $("#formMain1").serialize(),
        cache: false,
        beforeSend: function () {
            document.getElementById(message3).innerHTML = "Ожидание данных...";
        },
        success: function (response) {
            document.getElementById(message1).innerHTML = response[0];
            document.getElementById(message2).innerHTML = response[1];
            document.getElementById(message3).innerHTML = response[2];
            $('.reset').val('');
            if(response[3] == 'admin') {
                location.href = 'http://practice/admin/client';
            }
            if (response[0] == "" && response[1] == "" && response[2] == "" && response[3] == "") {
                $('#exampleModalCenter1').modal('toggle');
                swal({
                    title: "Вход в аккаунт выполнен !",
                    text: "Приятных покупок.",
                    icon: "success",
                    button: "OK"
                }).then(function () {
                    location.reload();
                });
            }
        },
        error: function () {
            document.getElementById(message3).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
        }
    });
}