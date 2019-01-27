function AjaxSendMessage(email, text_message) {
    $.ajax({
        url: 'http://practice/main/send',
        type: "POST",
        data: {
            "email": $('#' + email).val(),
            "text_message": $('#' + text_message).val()
        },
        dataType: "html",
        cache: false,
        success: function (response) {
            if (response == 'success') {
                swal({
                    title: "Письмо отправлено !",
                    icon: 'success'
                })
            }
        }
    });
}

function ShowWindow(title, icon) {
    swal({
        title: title,
        icon: icon
    }).then(function () {
        if (icon == 'success') {
            location.reload();
        }
    });
}