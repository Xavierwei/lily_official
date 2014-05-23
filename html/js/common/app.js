define([
    // libs
    'jQuery',
    'skrollr',

    // apps
    'common/switchPage',
    'common/animate',
    'common/helper'
], function($, skrollr, switchPage, animate, helper) {
    var initialize = function() {
        // start loading animation
        animate.start();

        // start catch album and videos open event
        helper.modals();

        // update the link to hash mode
        switchPage.init()
    }

    return initialize;
})
