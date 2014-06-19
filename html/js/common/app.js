define([
    // libs
    'jQuery',
    'skrollr',

    // apps
    'common/switchPage',
    'common/loading',
    'common/helper',
    'common/map',
], function($, skrollr, switchPage, loading, helper, map) {
    var initialize = function() {
        // get current location
        //map.getPosition();

        // start loading
        loading.start();

        // start catch album and videos , weibo events
        helper.init();

        // update the link to hash mode
        switchPage.init();
    }

    return initialize;
})
