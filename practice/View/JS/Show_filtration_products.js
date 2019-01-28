$(document).ready(function () {
    var btn = document.getElementById("showBtn");
    $('input[type=checkbox]').click(function (e) {
        document.getElementById('showBtn').disabled = false;
        var brands = '', tempArray = [];
        $('input[name="brands[]"]:checked').each(function(){
            tempArray.push($(this).val());
        });
        if(tempArray.length !== 0){
            brands+='brands='+tempArray.toString();
            tempArray = [];
        }
        // window.location ='example.com?seasoning='+seasoning;
        btn.onclick = function(e)
        {
            window.location = '/'+brands;
        }
        console.log('example.com?'+brands);

    });

});