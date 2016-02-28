function doAjaxRequest(param) {

    "use strict";
    // Set these following variable to empty.
    var getData  = "",
        retValue = "",
        message  = "";

    if (param.formId !== false && param.formId !== '') {
        getData = $(param.formId).serialize();
    } else if (param.dataContainer !== false && param.dataContainer !== '') {
        getData = param.dataContainer;
    }

    // Set the request type to GET by default
    if (param.requestType === '' || param.requestType === false) {
        param.requestType = 'GET';
    }

    $.ajax({
        type: param.requestType,
        url: param.urlPath,
        data: getData,
        dataType: param.dataType = (param.dataType === false) ? "text" : param.dataType,
        cache: false,
        async: false,
        error: function (jqXHR, textStatus, errorThrown) {
            // If the request fails, throw a notification.
            retValue = textStatus + ': ' + jqXHR.status + ' ' + errorThrown;
        },
        success: function (msg) {
            // If success, pass the result.
            if (param.dataType === "json") {
                retValue = msg;
            } else {
                // Remove the annoying white space if any.
                retValue  = msg.replace(/^\s*|\s*$/g, '');
            }
        }
    });

    return retValue; // Return the result to the requester

}

/**
 * Return the current base url
 * @return string Base URL
 */
function baseUrl() {

    var protocol = window.location.protocol
      , host = window.location.host
      , pathName = window.location.pathname.split('/');

    return protocol + '//' + host + '/' + pathName[1];

}


function alertNotification(options) {

    BootstrapDialog.show({
        title: options.title
      , message: options.message
      , type: options.type
      , closable: false
      , buttons: [{
            icon: 'fa fa-times'
          , label: 'Close'
          , cssClass: 'btn-default'
          , action: function (dialog) {
                dialog.close();
            }
        }]
    });

}

function clearFormFields(form) {

    $(form).find('input, select').val('');

}
