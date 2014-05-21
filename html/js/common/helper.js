define([
    // libs
    'jquery',
    'Handlebars',
    // tpls
    'lib/text!templates/album.html',

    // plugins
    'jquery.jcarousel',
    'jquery.fancybox',
    'jquery.fancybox-media'
], function($, Handlebars, albumTpl) {
    var getHash = function () {
        var sVal = $.address.value();

        if (sVal == '/') {
            return 'index';
        } else {
            return sVal.replace('/', '');
        }
    }

    var modals = function () {
        var dBody = $('body');

        dBody.delegate('.album', 'click', function () {
            var sHthml = Handlebars.compile(albumTpl)();

            $.fancybox({
                content : sHthml,
                closeClick  : false,
                helpers : {
                    overlay : {
                        width : '100%',
                        height : '100%',
                        closeClick : false,
                        css : {
                            'background' : '#fff'
                        }
                    }
                },
                beforeShow : function () {
                    setTimeout(function () {
                        var jcarousel = $('.fancybox-inner .jcarousel');

                        jcarousel.on('jcarousel:reload jcarousel:create', function () {
                            var width = jcarousel.innerWidth();
                            jcarousel.jcarousel('items').css('width', width + 'px');
                        }).jcarousel({
                            wrap: 'circular'
                        });

                        $('.jcarousel-control-prev').jcarouselControl({
                            target: '-=1'
                        });

                        $('.jcarousel-control-next').jcarouselControl({
                            target: '+=1'
                        });
                    }, 0)
                }
            })
        })

        dBody.delegate('.videos', 'click', function () {
            // body...
        })
    }

    return {
        getHash : getHash,
        modals : modals
    }
})
