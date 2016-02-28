$(document).ready(function () {

    // Save personel information
    $("#update-user-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/update-user-info',

            data: $("#update-user-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err_user_email").text(msg.error.user_email);
                    $("#err_user_lastname").text(msg.error.user_lastname);
                    $("#err_user_firstname").text(msg.error.user_firstname);
                    $("#err_user_middlename").text(msg.error.user_middlename);
                    $("#err_user_password").text(msg.error.user_password);
                    $("#err_user_confirm_password").text(msg.error.user_confirm_password);
                } else {
                    alert(msg.notification);
                    clearFormFields("#update-user-form");
                    window.location.replace( baseUrl() + '/admin/users-lists');
                }
            }
        });
    });

});