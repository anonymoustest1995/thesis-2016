$(document).ready(function () {

    var $cat = $('select[name=category]'),
    $items = $('select[name=items]');

    $cat.change(function(){
        var $this = $(this).find(':selected'),
            rel = $this.attr('rel'),
            $set = $items.find('option.' + rel);
        
        if ($set.size() < 0) {
            $items.hide();
            return;
        }
        
        $items.show().find('option').hide();
        
        $set.show().first().prop('selected', true);
    })


    // Save user information
    $("#save-user-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/admin/save-user-information',

            data: $("#create-user-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err_user_username").text(msg.error.user_username);
                    $("#err_user_email").text(msg.error.user_email);
                    $("#err_user_lastname").text(msg.error.user_lastname);
                    $("#err_user_firstname").text(msg.error.user_firstname);
                    $("#err_user_middlename").text(msg.error.user_middlename);
                    $("#err_user_password").text(msg.error.user_password);
                    $("#err_user_confirm_password").text(msg.error.user_confirm_password);

                } else {
                    alert(msg.notification);
                    clearFormFields("#create-user-form");
                    $('#addUserModal').modal('hide');
                    // window.location.reload();
                    window.location.replace( baseUrl() + '/admin/users-lists');
                }
            }
        });
    })

// Save user information
    $("#save-user-update-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/admin/save-user-update-information',

            data: $("#create-user-update-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err_user_password").text(msg.error.user_password);
                    $("#err_user_confirm_password").text(msg.error.user_confirm_password);

                } else {
                    alert(msg.notification);
                    clearFormFields("#create-user-update-form");
                    $('#updateUserModal').modal('hide');
                    // window.location.reload();
                    window.location.replace( baseUrl() + '/admin/users-lists');
                }
            }
        });
    })

    $("#save-position-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/admin/save-position-information',

            data: $("#create-position-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err_position_description").text(msg.error.position_description);
                } else {
                    alert(msg.notification);
                    clearFormFields("#create-position-form");
                    $('#addPositionModal').modal('hide');
                    // window.location.reload();
                    window.location.replace( baseUrl() + '/admin/users-lists');
                }
            }
        });
    })


    $("#save-inspection-area-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/admin/save-inspection-area-information',

            data: $("#create-inspection-area-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err_area_description").text(msg.error.area_description);
                } else {
                    alert(msg.notification);
                    clearFormFields("#create-inspection-area-form");
                    window.location.reload();
                    /*window.location.replace( baseUrl() + '/admin/users-lists');*/
                }
            }
        });
    })

    $("#save-inspection-type-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/admin/save-inspection-type-information',

            data: $("#create-inspection-type-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    $("#err_inspection_type_description").text(msg.error.inspection_type_description);
                    $("#err_position_description").text(msg.error.position_description);
                } else {
                    alert(msg.notification);
                    clearFormFields("#create-inspection-type-form");
                    $('#addInspectionTypeModal').modal('hide');
                    // window.location.reload();
                    window.location.replace( baseUrl() + '/admin/inspection-areas');
                }
            }
        });
    })

    $("#save-approved-info").click(function (event) {
    event.stopImmediatePropagation();

    $.ajax({
        type: "POST",
        url: baseUrl() + '/admin/save-approved-information',

        data: $("#create-approved-form").serialize(),

        dataType: 'json',

        error: function (jqXHR, textStatus, errorThrown) {
            // If the request fails, throw a notification.
            alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
        },

        success: function (msg) {
            if (msg.notification === "Validation error") {
               alert(msg.notification);

            } else {
                    alert(msg.notification);
                    clearFormFields("#create-approved-form");
                    window.location.replace( baseUrl() + '/admin/approved-reports');
                }
            }
        });
    })

    $("#save-assign-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/admin/save-assign-information',

            data: $("#create-assign-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    alert(msg.notification);
                } else {
                    alert(msg.notification);
                    clearFormFields("#create-assign-form");
                    window.location.reload();
                }
            }
        });
    })

    
    $("#save-assign-annual-info").click(function (event) {
        event.stopImmediatePropagation();

        $.ajax({
            type: "POST",
            url: baseUrl() + '/admin/save-assign-annual-information',

            data: $("#create-assign-annual-form").serialize(),

            dataType: 'json',

            error: function (jqXHR, textStatus, errorThrown) {
                // If the request fails, throw a notification.
                alert(textStatus + ': ' + jqXHR.status + ' ' + errorThrown);
            },

            success: function (msg) {
                if (msg.notification === "Validation error") {
                    alert(msg.notification);
                } else {
                    alert(msg.notification);
                    clearFormFields("#create-assign-annual-form");
                    window.location.reload();
                }
            }
        });
    })

});