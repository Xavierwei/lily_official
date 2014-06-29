define([
    // libs
    'jQuery',
    'skrollr',
    // apps
    'common/switchPage',
    'common/loading',
    'common/helper',
    'common/map',
    'common/api',
    'common/properties-' + ( window.lang || 'en' )
], function($, skrollr, switchPage, loading, helper, map , api , lang ) {
    // fix lang
    window._e = function( text ){
        return lang[ text ] || text;
    };

    $('a[data-lang]').click(function(){
        api.setCookie('lang' , $(this).data('lang') , 60 * 60 * 24 * 30);
    });


    var initialize = function() {
        // get current location
        //map.getPosition();

        // start loading
        loading.start();

        // if ie8
        if( $.browser.msie && $.browser.version <= 8 ){
            $('.loading.top').css({
                top: 70,
                width: '90%'
            });
            $('.loading.bottom').css({
                bottom: 70,
                width: '90%'
            });
            $('.loading.left,.loading.right')
                .css({
                    height: 'auto',
                    top: 70,
                    bottom: 70
                });
        }

        // start catch album and videos , weibo events
        helper.init();

        // update the link to hash mode
        switchPage.init();
    };

    return initialize;
})
