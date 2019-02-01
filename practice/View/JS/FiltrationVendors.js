function infoCheckBox() {
    var vendor = "";
    $('input:checkbox:checked').each(function(){
        vendor += $(this).val() + " ";
    });
    location.href = "http://practice/catalog/index/?category=1&vendor=" + vendor;
}