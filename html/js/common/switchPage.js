define([
    // libs
    'jquery',

    // apps
    'common/helper'
], function($, helper) {
    var isNext,
        isAnimate = false,
        dBody = $('body');

    var start = function () {
        var nTime = 1000,
            nWidth  = $(window).width(),
            nHeight  = $(window).height(),
            dHeader = dBody.find('.header'),
            dShowy = dBody.find('.showy'),
            compelete = function () {
                isAnimate = false;
                dBody.removeAttr('style');
            };

        isAnimate = true;

        // limit the width
        dBody.css('position', 'relative');
        dBody.css('height', nHeight + 'px');

        if (isNext) {
            dBody.animate({
                'marginLeft' : '-' + nWidth / 2 + 'px',
                'left' : '-' + nWidth / 2 + 'px',
                'opacity' : 0
            },nTime, function () {
                compelete()
            })

            dHeader.animate({
                'marginLeft' : '-' + nWidth + 'px',
                'opacity' : 0
            },nTime, function () {
                compelete()
            })
        } else {
            dBody.animate({
                'marginLeft' : nWidth / 2 + 'px',
                'left' : nWidth / 2 + 'px',
                'opacity' : 0
            },nTime, function () {
                compelete()
            })

            dHeader.animate({
                'marginLeft' : nWidth + 'px',
            },nTime, function () {
                compelete()
            })
        }

    }

    var end = function (str) {
        var timer,
            setContent = function () {
                dBody.html(str)
                updateLink();
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
        var sVal = helper.getHash();

        $.ajax({
            url : sVal + '.html',
            method:'get',
            beforeSend: function () {
                start();
            },
            success: function(str) {
                var startWith = '<body>',
                    endWith = '</body>',
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

    var updateLink = function () {
        var dCur,
            nCur,
            dMenu = $('.header .nav a[title]'),
            dVip = $('.logo a[title]'),
            sVal = helper.getHash(),
            updateStatus = function (evt, dTarget, nIndex) {
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

        // vip url to hash mode
        dVip.attr('href', '#' + dVip.attr('title'));

        if (dVip.hasClass('on')) {
            dCur = dVip;
            nCur = 0;
        }

        // update active class
        dMenu.bind('click', function (evt) {
            var dTarget = $(this),
                nIndex = dTarget.index() + 1; //for vip

            updateStatus(evt, dTarget, nIndex);
        })

        dVip.bind('click', function (evt) {
            var dTarget = $(this),
                nIndex = 0;

            updateStatus(evt, dTarget, nIndex);
        })
    }

    return {
        start : start,
        end : end,
        updateContent : updateContent,
        updateLink : updateLink
    }
})
