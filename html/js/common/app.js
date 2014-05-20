define([
    // libs
    'jquery',
    'skrollr',
    'Handlebars',
    'jquery.address',

    // apps
    'common/switchPage',
    'common/animate'
], function($, skrollr, Handlebars, jqueryAddress, switchPage, animate) {
    var initialize = function() {
        // start loading animation
        animate.start();

        // when page started, force to empty value
        $.address.value('');

        // update the link to hash mode
        switchPage.updateLink()

        // Address handler
        $.address.init().change(function() {
            // page update
            switchPage.updateContent()
        })
    }

    return initialize;
})
