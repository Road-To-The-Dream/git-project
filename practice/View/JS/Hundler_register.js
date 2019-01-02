function AjaxFormRegister(message1, message2, message3, message4, message5) {
    $.ajax({
        url:     'http://practice//CheckRegister',
        type:     "POST",
        dataType: "json",
        data: $("#formMain2").serialize(),
        cache: false,
        beforeSend : function() {
            document.getElementById(message5).innerHTML = "Ожидание данных...";
        },
        success: function(response) {
            document.getElementById(message1).innerHTML = response[0];
            document.getElementById(message2).innerHTML = response[1];
            document.getElementById(message3).innerHTML = response[2];
            document.getElementById(message4).innerHTML = response[3];
            document.getElementById(message5).innerHTML = response[4];
            $('.reset').val('');
            if(response[0] == "" && response[1] == "" && response[2] == "" && response[3] == "" && response[4] == "") {
                $('#exampleModalCenter1').modal('toggle');
                setTimeout(function() {
                    location.href = "http://practice/main/show_main"
                }, 500);
            }
        },
        error: function(response) {
            document.getElementById(message5).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
        }
    });
}