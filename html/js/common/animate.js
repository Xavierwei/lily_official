 define([
    // libs
    'jquery',
    'skrollr',
    'imagesLoaded'
], function($, skrollr, imagesLoaded) {
    var oRoll,
        dWrap = $('#wrap'),
        dSquare = $('#square'),
        dLeft = dSquare.find('.left'),
        dBottom = dSquare.find('.bottom'),
        dRight = dSquare.find('.right'),
        dTop = dSquare.find('.top');

    var start = function () {
        var nTime = 300,
            nLoad = 0,
            nTotal = dWrap.find('img').length,
            imgLoad = imagesLoaded(dWrap);

        dSquare.fadeIn();

        imgLoad.on('always', function (instance) {
            dTop.queue(function () {
                dTop.dequeue();

                dTop.animate({
                    'width' : '100%'
                }, nTime, function () {
                    dWrap.fadeIn();

                    oRoll = skrollr.init({
                        forceHeight: false
                    })
                })
            })
        })

        imgLoad.on('progress', function (instance, image) {
            nLoad += 1;

            var nVal = parseInt((nLoad/nTotal) * 100);

            if (0 < nVal && nVal < 25) {
                dRight.css({
                    'height' : parseInt((nVal/25) * 100 ) + '%'
                })

                return;
            }

            if (25 < nVal && nVal < 50) {
                dRight.css({
                    'height' : '100%'
                })

                dBottom.css({
                    'width' : parseInt((nVal/50) * 100) + '%'
                })

                return;
            }

            if (50 < nVal && nVal < 75) {
                dBottom.css({
                    'width' : '100%'
                })

                dLeft.css({
                    'height' : parseInt((nVal/75) * 100) + '%'
                })

                return;
            }

            if (75 < nVal && nVal < 100) {
                dLeft.css({
                    'height' : '100%'
                })

                dTop.animate({
                    'width' : parseInt((nVal/100) * 100) + '%'
                }, nTime)

                return;
            }
        })
    }

    var reset = function () {
        dSquare.fadeOut();
        dSquare.find('span').removeAttr('style');
    }

    return {
        start : start,
        reset : reset
    }
})
