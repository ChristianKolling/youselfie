$(document).ready(function () {
    $('#post-form').submit(function () {
        var dados = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/home/welcome/home",
            data: dados,
            success: function (data)
            {
                $("#publicacao").val(null);
            },
            error: function () {

            }
        });
        return false;
    });
});
//$(document).ready(function () {
//    $("#album").submit(function () {
//        var dados = $(this).serialize();
//        $.ajax({
//            type: 'POST',
//            url: "/home/welcome/upload-album",
//            data: dados,
//            cache: false,
//            contentType: false,
//            processData: false,
//            success: function (data) {
//                console.log("success");
//                console.log(data);
//            },
//            error: function (data) {
//                console.log("error");
//                console.log(data);
//            }
//        });
//    });
//});