function AjaxAddComment(text_comment, id_product) {
    $.ajax({
        url:  'http://practice//AddingComments',
        type: "POST",
        data: { "TextComment" : $('#' + text_comment).val(),
                "IDProduct" : id_product},
        dataType: "json",
        cache: false,
        success: function(response) {
            ShowWindow(response[0], response[1]);
        }
    });
}

function ShowWindow(title, icon) {
    swal({
        title: title,
        icon: icon
    }).then(function() {
        if(icon == 'success') {
            location.reload();
        }
    });
}