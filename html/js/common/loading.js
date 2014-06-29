define([
    // libs
    'jQuery',
    'skrollr',
    'imagesLoaded',
    'Handlebars',
    'scrollpanel',
    'lib/jquery/jquery.mousewheel',
    // apps
    'common/api',
    'common/helper',
    'common/map',
    'common/select',
    'lib/text!templates/news.html'
], function($, skrollr, imagesLoaded, Handlebars, panel , mousewheel , api, helper, map, select, newsTpl) {
    var oRoll,
        oSkrollr = null,
        dWrap = $('#wrap'),
        dLeft = $('.loading.left'),
        dBottom = $('.loading.bottom'),
        dRight = $('.loading.right'),
        dTop = $('.loading.top'),
        dTape = $('.showy');

    // new overlay init
    var newsInit = function () {
        var dEvent = $('.event_list');

        if (dEvent.length) {
            dEvent.delegate('a.event_open', 'click', function() {
                var news_id = $(this).parents('.event_item').data('nid');
                api.getNews({
                    data : { news_id : news_id },
                    success : function (oData) {
                        var sNews = Handlebars.compile(newsTpl)(oData);

                        helper.overlay(sNews, function(){

                        } , function(){
                            var dOverlay = $.fancybox.wrap.parent();
                            // for custom style
                            dOverlay.attr('id', 'news');
                            dOverlay.find('.newswrap-inner')
                                .height( $(window).height() * 0.9 * 0.8)
                                .jScrollPane({autoReinitialise:true})
                                .css('overflow' , 'visible');

                            dOverlay.find('.fancybox-skin').click(function( e ){
                                    var tar = e.target || e.srcElement;
                                    if( $(tar).hasClass('fancybox-skin') )
                                        $.fancybox.close();
                                });
                        } )
                    }
                })
            })
        }
    }

    // the loading animation start
    var start = function() {
        // enable selects
        select.init();

        // enable news page overlay
        newsInit();

        // try to init the map
        map.init();

        // if using mobile or ugly ie, stop the animation
        if (!helper.canAnimate()) {
            // show the page content
            dWrap.fadeIn();

            return;
        }

        var nTime = 300,
            nLoad = 0,
            nTotal = dWrap.find('img').length,
            imgLoad = imagesLoaded(dWrap);

        var getQueryString = function(name) {
            var reg = new RegExp("(.*?)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.hash.match(reg);
            if (r != null) return unescape(r[2]); return null;
        }

        var localHash = function () {
            var hashtag = getQueryString('hash');
            if($('#'+hashtag).length > 0) {
                var top = $('#'+hashtag).offset().top - 100;
                setTimeout(function(){
                    $('html,body').animate({scrollTop:top});
                },10);

            }

        }

        imgLoad.on('always', function(instance) {
            dTop.queue(function() {
                dTop.dequeue();

                var dHeight = $(window).height() - 70*2;
                dRight.animate({
                    height: dHeight
                } , 200);
                dBottom
                    .delay(200)
                    .animate({
                        'width':'90%'
                    } , 200);

                dLeft.delay(400)
                    .animate({
                        'height':dHeight
                    } , 200);

                dTop.delay(600).animate({
                    'width': '90%'
                }, nTime, function() {
                    // show the page content
                    dWrap.fadeIn();

                    // show tapes
                    dTape.fadeIn();

                    localHash();

                    if (oSkrollr) {
                        oSkrollr.refresh();
                    } else {
                        // let elements skroll
                        oSkrollr = skrollr.init({
                            edgeStrategy: 'set',
                            forceHeight: false
                        })
                    }
                })
            })
        })

        $(window).resize(function(){
            var dHeight = $(window).height() - 70*2;
            dRight.css('height', dHeight);
            dLeft.css('height', dHeight);
        });
        // imgLoad.on('progress', function(instance, image) {
        //     nLoad += 1;
        //     var nVal = parseInt((nLoad / nTotal) * 100);
        //     if (0 < nVal && nVal < 25) {
        //         dRight.css({
        //             'height': dHeight * nVal / 25
        //         });
        //         return;
        //     }
        //     if (25 < nVal && nVal < 50 ) {

        //         dRight.css({
        //             'height': dHeight
        //         });

        //         dBottom.css({
        //             'width': parseInt((nVal / 50) * 100) + '%'
        //         }); 

        //         return;
        //     }

        //     if (50 < nVal && nVal < 75) {
        //         dBottom.css({
        //             'width': '90%'
        //         })

        //         dLeft.css({
        //             'height': parseInt((nVal / 75) * 100) + '%'
        //         })

        //         return;
        //     }

        //     if (75 < nVal && nVal < 100) {
        //         dLeft.css({
        //             'height': '75%'
        //         })

        //         dTop.animate({
        //             'width': parseInt((nVal / 100) * 100) + '%'
        //         }, nTime)

        //         return;
        //     }
        // })
    }

    return {
        start: start
    }
})
