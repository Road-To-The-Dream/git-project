function AjaxRemoveComment(id_comment) {
    $.ajax({
        url:  'http://practice//RemoveComments',
        type: "POST",
        data: "id_comment=" + id_comment,
        cache: false,
        success: function(response) {
            ShowWindow('Комментарий успешно удалён !', 'success');
        },
        error: function(response) {
            ShowWindow('Произошла ошибка !', 'error');
        }
    });
}

function ShowWindow(title, icon) {
    swal({
        title: title,
        icon: icon
    }).then(function() {
        location.reload();
    });
}