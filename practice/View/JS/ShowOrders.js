$(document).ready(function(){
    $('.cart-container').show();
});

function AjaxShowOrders() {
    $.ajax({
        url: 'http://practice/orders/checkProductInOrders',
        type: "POST",
        dataType: "json",
        cache: false,
        success: function (response) {
            if (response['icon'] == 'error') {
                swal({
                    title: response['message'],
                    icon: response['icon']
                })
            } else {
                location.href = 'http://practice/orders';
            }
        }
    });
}