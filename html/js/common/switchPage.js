define([
    // libs
    'jquery',

    // apps
    'common/helper',
    'common/animate'
], function($, helper, animate) {
    var isNext,
        isFirst = true,
        isAnimate = false,
        dBody = $('body'),
        dWrap = $('#wrap'),
        dSquare = $('#square');

    var start = function () {
        var nTime = 600,
            sHash = helper.getHash(),
            nWidth  = $(window).width(),
            nHeight  = $(window).height(),
            compelete = function () {
                isAnimate = false;

                // reset wrap style
                dWrap.removeAttr('style');

                // update page class
                dBody.attr('class', sHash);
            };

        // prevent duplicate animate
        isAnimate = true;

        // reset loading animate need stuff
        animate.reset();

        if (isNext) {
            dWrap.animate({
                'marginLeft' : '-' + nWidth / 2 + 'px',
                'left' : '-' + nWidth / 2 + 'px',
                'opacity' : 0
            }, nTime, function () {
                compelete()
            })
        } else {
            dWrap.animate({
                'marginLeft' : nWidth / 2 + 'px',
                'left' : nWidth / 2 + 'px',
                'opacity' : 0
            }, nTime, function () {
                compelete()
            })
        }

    }

    // when animate end html the wrap
    var end = function (str) {
        var timer,
            setContent = function () {
                dWrap.html(str)
                animate.start();
            };

        if (isAnimate) {
            timer = setInterval(function () {
                if (!isAnimate) {
                    // update content
                    setContent();
                    // clear interval
                    clearInterval(timer);
                }
            }, 300)
        } else {
            setContent();
        }
    }

    var updateContent = function () {
        // prevent sometime when first time page loaded also would fire the event
        if (isFirst) {
            isFirst = false;
        } else {
            $.ajax({
                url : helper.getHash() + '.html',
                method:'get',
                beforeSend: function () {
                    start();
                },
                success: function(str) {
                    var startWith = "<section id='wrap'>",
                        endWith = '</section>',
                        iStart = str.search(startWith),
                        iEnd = str.search(endWith);

                    str= str.substring(iStart+startWith.length, iEnd);

                    end(str)
                },
                error: function () {
                    // to do
                }
            })
        }
    }

    var updateLink = function () {
        var dCur,
            nCur,
            dMenu = $('.header .nav a[title]'),
            dVip = $('.logo a[title]'),
            updateCache = function (evt, dTarget, nIndex) {
                // prevent click the active effect
                if (dTarget.hasClass('on')) {
                    evt.preventDefault();
                    return;
                } else {
                    dCur.removeClass('on');
                    dTarget.addClass('on');

                    if (nIndex > nCur) {
                        isNext = true;
                    } else {
                        isNext = false;
                    }

                    // update cached status
                    dCur = dTarget;
                    nCur = nIndex;
                }
            }

        // switch menu url to hash mode
        dMenu.each(function(nIndex, dEl) {
            var dTmp = $(dEl),
                sTitle = dTmp.attr('title');

            dTmp.attr('href', '#' + sTitle);

            // update cached status
            if (dTmp.hasClass('on')) {
                dCur = dTmp;
                nCur = nIndex + 1;  //for vip
            }
        })

        // update cached status, if page first time opened with vip page
        if (dVip.hasClass('on')) {
            dCur = dVip;
            nCur = 0;
        }

        // vip url to hash mode
        dVip.attr('href', '#' + dVip.attr('title'));

        // update active class
        dMenu.bind('click', function (evt) {
            // update judge params
            isFirst = false;

            var dTarget = $(this),
                nIndex = dTarget.index() + 1; //for vip

            updateCache(evt, dTarget, nIndex);
        })

        dVip.bind('click', function (evt) {
            // update judge params
            isFirst = false;

            var dTarget = $(this),
                nIndex = 0;

            updateCache(evt, dTarget, nIndex);
        })
    }

    return {
        start : start,
        end : end,
        updateContent : updateContent,
        updateLink : updateLink
    }
})
