$(document).ready(function () {
    $('#typeahead').typeahead({
        source: function (query, result) {
            $.ajax({
                url: "http://practice/main/search",
                method: "POST",
                data: {
                    query: query
                },
                dataType: "json",
                success: function (data) {
                    result($.map(data, function (item) {
                        return item;
                    }));
                }

            })
        },
        updater: function (item) {
            location.href = 'http://practice/product/index/' + item.id;
            return item
        }
    });

});