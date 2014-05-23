define([
    // libs
    'jquery',
    // apps
    'common/animate'
], function($, animate) {
    var sCur,
        isNext,
        isAnimate = false,
        dBody = $('body'),
        dWrap = $('#wrap');

    // loading animation start
    var pageAnimate = function () {
        var nTime = 600,
            nWidth  = $(window).width(),
            nHeight  = $(window).height(),
            compelete = function () {
                isAnimate = false;

                // reset wrap style
                dWrap.removeAttr('style');

                // update page class
                dBody.attr('class', sCur);
            };

        // prevent duplicate animate
        isAnimate = true;

        dWrap.css('position', 'relative')

        if (isNext) {
            dWrap.animate({
                'left' : '-' + nWidth / 2 + 'px',
                'opacity' : 0
            }, nTime, function () {
                compelete()
            })
        } else {
            dWrap.animate({
                'left' : nWidth / 2 + 'px',
                'opacity' : 0
            }, nTime, function () {
                compelete()
            })
        }
    }

    // when animate end html the wrap
    var setContent = function (str) {
        var timer,
            set = function () {
                dWrap.html(str);
                animate.start();
            };

        if (isAnimate) {
            timer = setInterval(function () {
                if (!isAnimate) {
                    // update content
                    set();
                    // clear interval
                    clearInterval(timer);
                }
            }, 300)
        } else {
            set();
        }
    }

    var updatePage = function () {
        $.ajax({
            url : sCur + '.html',
            method:'get',
            beforeSend: function () {
                pageAnimate();
            },
            success: function(str) {
                var startWith = "<section id='wrap'>",
                    endWith = '</section>',
                    iStart = str.search(startWith),
                    iEnd = str.search(endWith);

                str= str.substring(iStart+startWith.length, iEnd);

                setContent(str)
            }
        })
    }

    var init = function () {
        var dCur,
            nCur,
            dMenus = $('.header a[title]');

        // switch menu url to hash mode
        dMenus.each(function(nIndex, dEl) {
            var dTmp = $(dEl),
                sTitle = dTmp.attr('title');

            // url to hash mode
            dTmp.attr('href', '#' + sTitle);

            // update judge params
            if (dTmp.hasClass('on')) {
                dCur = dTmp;
                sCur = sTitle;
                nCur = dTmp.index();
            }
        })

        // update active class
        dMenus.bind('click', function (e) {
            var dTarget = $(this),
                sTitle = dTarget.attr('title'),
                nIndex = dTarget.index();

            // prevent click the active effect
            if (dTarget.hasClass('on')) {
                return e.preventDefault();
            }

            // update class
            dCur.removeClass('on');
            dTarget.addClass('on');

            // update judge params
            if (nIndex > nCur) {
                isNext = true;
            } else {
                isNext = false;
            }

            dCur = dTarget;
            sCur = sTitle;
            nCur = nIndex;

            // page update
            updatePage()
        })
    }

    return {
        init : init
    }
})
