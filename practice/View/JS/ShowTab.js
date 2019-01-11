function ShowFirstTab() {
    $('#pills-tab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });

    $('#pills-tab li:eq(0) a').tab('show') // выбор вкладки по номеру
}

function ShowLastTab() {
    $('#pills-tab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });

    $('#pills-tab li:eq(1) a').tab('show') // выбор вкладки по номеру
}