$(function () {
    
    $.get("dashboard/xhrGetListings",'', function(data){
        alert("Data: " + data);
    },"json");
    
    $('#randomInsert').submit(function () {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        console.log(data);


        $.post(url, data, function (o) {
            alert(1);
        });

        return false;
    });

});