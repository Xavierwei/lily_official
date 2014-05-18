define([
    // libs
    'jquery',
    'skrollr',
    'Handlebars',
    'jquery.address',

    // apps
    'common/switchPage'
], function($, skrollr, Handlebars, jqueryAddress, switchPage) {
    var initialize = function() {
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
