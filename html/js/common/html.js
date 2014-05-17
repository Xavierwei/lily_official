define(["jquery"], function($) {
    var request = function (sVal, callback) {
        $.ajax({
            url : sVal + '.html',
            method:'get',
            success: function(str) {
                var dHtml = $('<div>' + str + '</div>');

                callback(dHtml)
            },
            error: function () {
                // to do
            }
        })
    }

    return request;
})
