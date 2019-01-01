function AjaxFormRegister(message1, message2, message3) {
    $.ajax({
        url:     'http://practice//Logout',
        type:     "POST",
        dataType: "json",
        data: $("#formMain2").serialize(),
        cache: false,
        beforeSend : function() {
            document.getElementById(message3).innerHTML = "Ожидание данных...";
        },
        success: function(response) {
            document.getElementById(message1).innerHTML = response[0];
            document.getElementById(message2).innerHTML = response[1];
            document.getElementById(message3).innerHTML = response[2];
            $('.reset').val('');
            if(response[0] == "" && response[1] == "" && response[2] == "") {
                $('#exampleModalCenter1').modal('toggle');
                setTimeout(function() {
                    location.href = "http://practice/main/show_main"
                }, 500);
            }
        },
        error: function(response) {
            document.getElementById(message3).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
        }
    });
}