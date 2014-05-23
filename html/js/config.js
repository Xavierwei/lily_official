require.config({
    paths: {
        // lib
        jQuery : 'lib/jquery/jquery',
        Handlebars : 'lib/handlebars/handlebars',
        imagesLoaded : 'lib/imagesLoaded/imagesLoaded.min',
        skrollr : 'lib/skrollr/skrollr.min',
        templates:  '../js/templates'
    },
    priority: [
        'jQuery',
        'Handlebars',
        'imagesLoaded',
        'skrollr'
    ]
})

require([
    'require',
    'jQuery',
    'Handlebars',
    'imagesLoaded',
    'skrollr'
], function(require, $, Handlebars, imagesLoaded, skrollr) {
    require(['common/app'], function(app) {
        app();
    })
})
