define([], function($) {
    var helper = {};

    helper.getHash = function (str) {
        return str.replace('/', '');
    }

    return helper;
})
