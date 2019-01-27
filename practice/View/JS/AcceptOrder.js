function AjaxAcceptBuy(message1, message2, message3, message4, message5, message6, IdProduct) {
    $.ajax({
        url: 'http://practice/buy/validateBuy',
        type: "POST",
        dataType: "json",
        data: $("#formMain").serialize()+"&IDProduct="+IdProduct,
        cache: false,
        success: function (response) {
            document.getElementById(message1).innerHTML = response[0];
            document.getElementById(message2).innerHTML = response[1];
            document.getElementById(message3).innerHTML = response[2];
            document.getElementById(message4).innerHTML = response[3];
            document.getElementById(message5).innerHTML = response[4];
            document.getElementById(message6).innerHTML = response[5];
            $('.reset').val('');

            CountError(response);
        },
        error: function () {
            document.getElementById(message6).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
        }
    });
}

function CountError(response) {
    var count_errors = 0;
    var arr = [response[0], response[1], response[2], response[3], response[4], response[5]];
    response.forEach(function (item, arr) {
        if (item != "") {
            count_errors++;
        }
    });

    if (count_errors == 0) {
        location.href = 'success';
    }

}