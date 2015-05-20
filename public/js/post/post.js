$(document).ready(function () {
    $('#post-form').submit(function () {
        var dados = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/home/welcome/home",
            data: dados,
            success: function (data)
            {
                
            }
        });
        return false;
    });
});