/**
 * Created by damirseremet on 16/07/2017.
 */

$(function () {
    $("#string-form").on('submit', function (e) {
        e.preventDefault();
        $("#loader").show();
        $("#error").hide();
        $("#message").hide();
        $("#error").text('');
        var data = $(this).serialize();
        $.post('classes/route.php?form-process', data, function (response) {
            if (!response.success) {
                $("#error").text(response.error);
                $("#error").slideDown();
            }
            if (response.success) {
                $("#message").slideDown();
                $("#message .r_name").text(response.name);
                $("#message .r_phone").text(response.phone);
                $("#message .r_email").text(response.email);
                $("#message .r_address").text(response.address);
            }
        }, 'json').fail(function () {
            $("#error").text("Error has occurred");
            $("#error").slideDown();
        }).always(function(){
            $("#loader").hide();
        })
    })
})