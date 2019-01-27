function AjaxSendMessage(email, text_message, email_error, text_message_error) {
    $.ajax({
        url: 'http://practice/main/validateSend',
        type: "POST",
        data: {
            "email": $('#' + email).val(),
            "text_message": $('#' + text_message).val()
        },
        dataType: "json",
        cache: false,
        beforeSend: function () {
            document.getElementById(text_message_error).innerHTML = "Ожидание данных...";
        },
        success: function (response) {
            document.getElementById(email_error).innerHTML = response[0];
            document.getElementById(text_message_error).innerHTML = response[1];
            $('.reset').val('');
            if (response[0] == "" && response[1] == "") {
                ShowWindowSend("Письмо отправлено !", 'success');
            }
        },
        error: function () {
            ShowWindowSend("Произошла ошибка !", 'error');
        }
    });
}

function ShowWindowSend(title, icon) {
    swal({
        title: title,
        icon: icon
    }).then(function () {
        location.reload();
    });
}