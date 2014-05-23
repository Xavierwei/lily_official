define([
    // libs
    'jQuery',
    'skrollr',

    // apps
    'common/switchPage',
    'common/loading',
    'common/helper'
], function($, skrollr, switchPage, loading, helper) {
    var initialize = function() {
        // start loading
        loading.start();

        // start catch album and videos open event
        helper.modals();

        // update the link to hash mode
        switchPage.init()
    }

    return initialize;
})
