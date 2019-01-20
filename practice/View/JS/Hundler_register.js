function AjaxFormRegister(message1, message2, message3, message4, message5, message6, message7, message8) {
    $.ajax({
        url:     'http://practice/main/ValidateIsRegister',
        type:     "POST",
        dataType: "json",
        data: $("#formMain2").serialize(),
        cache: false,
        beforeSend : function() {
            document.getElementById(message8).innerHTML = "Ожидание данных...";
        },
        success: function(response) {
            document.getElementById(message1).innerHTML = response[0];
            document.getElementById(message2).innerHTML = response[1];
            document.getElementById(message3).innerHTML = response[2];
            document.getElementById(message4).innerHTML = response[3];
            document.getElementById(message5).innerHTML = response[4];
            document.getElementById(message6).innerHTML = response[5];
            document.getElementById(message7).innerHTML = response[6];
            document.getElementById(message8).innerHTML = response[7];
            $('.reset').val('');
            if(response[0] == "" && response[1] == "" && response[2] == "" && response[3] == "" && response[4] == "" && response[5] == "" && response[6] == "" && response[7] == "") {
                $('#exampleModalCenter1').modal('toggle');
                swal({
                    title: "Регистрация прошла успешно !",
                    text: "Теперь войдите в аккаунт.",
                    icon: "success",
                    button: "OK"
                }).then(function() {
                    setTimeout(function() {
                        location.href = "http://practice/main"
                    }, 200);
                });
            }
        },
        error: function(response) {
            document.getElementById(message8).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
        }
    });
}