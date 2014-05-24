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

        // start catch album and videos , weibo events
        helper.init();

        // update the link to hash mode
        switchPage.init()
    }

    return initialize;
})
