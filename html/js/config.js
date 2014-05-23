require.config({
    'paths': {
        // lib
        'jquery': 'lib/jquery-1.8.3.min',
        'skrollr' : 'lib/skrollr.min',
        'Handlebars': 'lib/handlebars',
        'jquery.fancybox': 'lib/jquery.fancybox',
        'jquery.fancybox-media': 'lib/jquery.fancybox-media',
        'imagesLoaded' : 'lib/imagesloaded.pkgd.min',
        'jquery.jcarousel' : 'lib/jquery.jcarousel.min'
    },
    shim: {
        'Handlebars': {
             exports: 'Handlebars'
        },
        'imagesLoaded' : {
            exports : 'imagesLoaded'
        },
        'jquery.address': {
            deps : ['jquery']
        },
        'jquery.jcarousel': {
            deps : ['jquery']
        },
        'jquery.fancybox': {
            deps : ['jquery']
        },
        'jquery.fancybox-media': {
            deps : ['jquery', 'jquery.fancybox']
        }
    }
})

require(['require'], function(require) {
    require(['common/app'], function(app) {
        app();
    })
})
