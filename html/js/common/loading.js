define([
    // libs
    'jQuery',
    'skrollr',
    'imagesLoaded',
    'Handlebars',
    // apps
    'common/api',
    'common/helper',
    'common/map',
    'common/select',
    'lib/text!templates/news.html'
], function($, skrollr, imagesLoaded, Handlebars, api, helper, map, select, newsTpl) {
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
            dEvent.delegate('a.event_look', 'click', function() {
                api.getNews({
                    data : { id : '1231313' },
                    success : function (oData) {
                        var sNews = Handlebars.compile(newsTpl)(oData);

                        helper.overlay(sNews, function() {
                            setTimeout(function() {
                                var dOverlay = $.fancybox.wrap.parent();

                                // for custom style
                                dOverlay.attr('id', 'news');
                            }, 0)
                        })
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

        imgLoad.on('always', function(instance) {
            dTop.queue(function() {
                dTop.dequeue();

                dRight.css('height', '75%');
                dBottom.css('width', '90%');
                dLeft.css('height', '75%');

                dTop.animate({
                    'width': '90%'
                }, nTime, function() {
                    // show the page content
                    dWrap.fadeIn();

                    // show tapes
                    dTape.fadeIn();

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

        imgLoad.on('progress', function(instance, image) {
            nLoad += 1;

            var nVal = parseInt((nLoad / nTotal) * 100);

            if (0 < nVal && nVal < 25) {
                dRight.css({
                    'height': parseInt((nVal / 25) * 100) + '%'
                })

                return;
            }

            if (25 < nVal && nVal < 50) {
                dRight.css({
                    'height': '75%'
                })

                dBottom.css({
                    'width': parseInt((nVal / 50) * 100) + '%'
                })

                return;
            }

            if (50 < nVal && nVal < 75) {
                dBottom.css({
                    'width': '90%'
                })

                dLeft.css({
                    'height': parseInt((nVal / 75) * 100) + '%'
                })

                return;
            }

            if (75 < nVal && nVal < 100) {
                dLeft.css({
                    'height': '75%'
                })

                dTop.animate({
                    'width': parseInt((nVal / 100) * 100) + '%'
                }, nTime)

                return;
            }
        })
    }

    return {
        start: start
    }
})
