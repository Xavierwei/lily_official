define([
    // libs
    'jQuery',
    'skrollr',
    'imagesLoaded'
], function($, skrollr, imagesLoaded) {
    var oRoll,
        dHeader = $('.header'),
        dWrap = $('#wrap'),
        dLeft = $('.loading.left'),
        dBottom = $('.loading.bottom'),
        dRight = $('.loading.right'),
        dTop = $('.loading.top');

    var start = function() {
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

                    // show header
                    dHeader.fadeIn();

                    // let elements skroll
                    oSkrollr = skrollr.init({
                        edgeStrategy: 'set',
                        forceHeight: false
                    })
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
