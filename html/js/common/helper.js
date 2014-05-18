define([
    // libs
    'jquery'
], function($) {
    var getHash = function () {
        var sVal = $.address.value();

        if (sVal == '/') {
            return 'index';
        } else {
            return sVal.replace('/', '');
        }
    }

    return {
        getHash : getHash
    }
})
