function AjaxRemoveComment(id_comment) {
    $.ajax({
        url:  'http://practice/comments/removeComments',
        type: "POST",
        data: "id_comment=" + id_comment,
        cache: false,
        success: function(response) {
            ShowWindowRemoveComment('Комментарий успешно удалён !', 'success');
        },
        error: function(response) {
            ShowWindowRemoveComment('Произошла ошибка !', 'error');
        }
    });
}

function ShowWindowRemoveComment(title, icon) {
    swal({
        title: title,
        icon: icon
    }).then(function() {
        location.reload();
    });
}