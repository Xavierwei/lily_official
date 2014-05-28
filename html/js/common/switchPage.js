define([
    // libs
    'jQuery',
    'Handlebars',
    // apps
    'common/loading',
    'common/helper',
    'lib/text!templates/links.html',
    'lib/text!templates/weixin.html'
], function($, Handlebars, loading, helper, linksTpl, weixinTpl) {
    var sPath = location.pathname,
        sCur = sPath.replace(sPath.match(/^.*\html\//), ''),
        isNext,
        isAnimate = false,
        dBody = $('body'),
        dWrap = $('#wrap'),
        dLoading = $('.loading'),
        dTape = $('.showy'),
        sLinks = Handlebars.compile(linksTpl)(),
        sWeixin = Handlebars.compile(weixinTpl)();

    // loading animation start
    var pageSwitchAnimate = function () {
        // if using mobile or ugly ie, stop the animation
        if (!helper.canAnimate()) return;

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

        // remove style for next loading animate
        dLoading.fadeOut().removeAttr('style').fadeIn();
        // hide tapes
        dTape.fadeOut();

        // for page switch animation need
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

    // for whole page hash link click catch
    var linkCatch = function () {
        var dLinks = dWrap.find('a[href^="#"]'),
            dWeixin = dWrap.find('.ft_share3');

        dLinks.bind('click', function () {
            var dTarget = $(this);

            sCur = dTarget.attr('href').replace('#', '');

            // as its hard to judge next or pre, default it would be next
            isNext = true;

            // page update
            updatePage()
        })

        dWeixin.bind('click', function () {
            helper.overlay(sWeixin, function () {
                setTimeout(function() {
                    var dOverlay = $('.fancybox-mobile').length ?  $('.fancybox-mobile') : $.fancybox.wrap.parent();

                    // for custom style
                    dOverlay.attr('id', 'weixin');
                }, 0)
            });
        })
    }

    // when animate end html the wrap
    var setContent = function (str) {
        var timer,
            setHtml = function () {
                dWrap.html(str);
                // update catch targets
                linkCatch()
                // loading
                loading.start();
            };

        if (isAnimate) {
            timer = setInterval(function () {
                if (!isAnimate) {
                    // update content
                    setHtml();
                    // clear interval
                    clearInterval(timer);
                }
            }, 300)
        } else {
            setHtml();
        }
    }

    var updatePage = function () {
        $.ajax({
            url : sCur + '.html',
            method:'get',
            beforeSend: function () {
                pageSwitchAnimate();
            },
            success: function(str) {
                var dHtml = $('<div>' + str + '</div>');

                setContent(dHtml.find('#wrap').html())
            }
        })
    }

    // for enable links catch and modal etc.
    var init = function () {
        var dMenu = $('.header .menu'),
            showLinksModal = function () {
                var bFunc = function () {
                    setTimeout(function() {
                        var dOverlay = $('.fancybox-mobile').length ?  $('.fancybox-mobile') : $.fancybox.wrap.parent();

                        // for custom style
                        dOverlay.attr('id', 'links');

                        // for special method
                        dOverlay.delegate('.item a', 'click', function(e) {
                            var dTarget = $(this),
                                dCur = dOverlay.find('a.on'),
                                sTitle = dTarget.attr('title'),
                                nCur = dCur.attr('index') ? dCur.attr('index') : 0,
                                nTarget = dTarget.attr('index');

                            // click self
                            if (dTarget.hasClass('on')) {
                                return e.preventDefault();
                            }

                            // click others clickable link
                            if (sTitle) {
                                dCur.removeClass('on');
                                dTarget.addClass('on');
                                sCur = sTitle;

                                // update animation judge params
                                if (nTarget > nCur) {
                                    isNext = true;
                                } else {
                                    isNext = false;
                                }

                                // remove
                                $.fancybox.close(true);

                                // page update
                                updatePage()
                            }
                        })

                        // active the related link
                        dOverlay.find('a[href$="' + sCur + '"]').addClass('on');
                    }, 0)
                }

                helper.overlay(sLinks, bFunc);
            };

        // show
        dMenu.bind('click', function () {
            showLinksModal();
        })

        // update catch targets
        linkCatch();
    }

    return {
        init : init
    }
})
