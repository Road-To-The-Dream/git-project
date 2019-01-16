function AjaxAddComment(id_user, text_comment, id_product) {
    $.ajax({
        url:  'http://practice//AddingComments',
        type: "POST",
        data: {"IDUser" : id_user,
                "TextComment" : $('#' + text_comment).val(),
                "IDProduct" : id_product},
        dataType: "html",
        cache: false,
        success: function(response) {
            alert("Yes");
        },
        error: function (response) {
            alert("No");
        }
    });
}