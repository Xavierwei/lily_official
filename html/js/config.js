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
    $('document').ready(function () {
        require(['common/app'], function(app) {
            app();
        })
    })
})

// google map need those functions under global
var googleReady = function () {
    require(['common/map'], function(map) {
        map.init();
    })
}

var loadMapScript = function() {
    var script = document.createElement('script');

    script.type = 'text/javascript';

    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=zh-CN&callback=googleReady';

    document.body.appendChild(script);
}

window.onload = loadMapScript;
