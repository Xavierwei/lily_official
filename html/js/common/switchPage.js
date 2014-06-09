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
        var updateBodyClass = function () {
            var str = sCur;

            // update page class
            if (!helper.isPC()) {
                str = str + ' ' + 'mobile';

                if (dBody.hasClass('open')) {
                    str = str + ' ' + 'open';
                }
            }

            dBody.attr('class', str);
        }

        // if using mobile or ugly ie, stop the animation
        if (!helper.canAnimate()) {
            return updateBodyClass();
        }

        var nTime = 600,
            nWidth  = $(window).width(),
            nHeight  = $(window).height(),
            compelete = function () {
                isAnimate = false;

                // reset wrap style
                dWrap.removeAttr('style');

                // update page class
                updateBodyClass()
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
        var inAnimate = false,
            dMenu = $('.header .menu'),
            dNav = $('#nav'),
            dMbmenu = $('#nav'),
            showLinksModal = function () {
                // for special method
                dMbmenu.delegate('.item a', 'click', function(e) {
                    var dTarget = $(this),
                        dCur = dMbmenu.find('a.on'),
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
                dMbmenu.find('a[href$="' + sCur + '"]').addClass('on');
            },
            sliderMenu = function () {
                var dCurList = dMbmenu.find('.item ol.active'),
                    dCurLink = dMbmenu.find('a[href$="' + sCur + '"]');

                // shrik or expand the list
                dMbmenu.delegate('.item h2', 'click', function () {
                    var dList = $(this).next();

                    if (inAnimate) return;

                    inAnimate = true;

                    if (dCurList.length) {
                        dCurList.animate({
                            'height': '0px'
                        }, 600, function () {
                            dCurList.removeClass('active');
                            dList.removeAttr('style');
                        })
                    }

                    dList.animate({
                        'height': dList.children().length * 30 + 'px',
                    }, 600, function () {
                        dList.addClass('active');
                        dList.removeAttr('style');

                        inAnimate = false;
                    })

                    dCurList = dList;
                })

                // links
                dMbmenu.delegate('.item a', 'click', function () {
                    var dLink = $(this),
                        sHref = dLink.attr('href');

                    // if click self
                    if (dLink.hasClass('active')) {
                        return;
                    }

                    if (dCurLink.length) {
                        dCurLink.removeClass('active');
                    }

                    dLink.addClass('active');

                    dCurLink = dLink;

                    // update judge info
                    if (sHref.indexOf('#') >= 0) {
                        sCur = dLink.attr('href').replace('#', '');

                        // page update
                        updatePage()
                    }
                })

                dBody.toggleClass('open');
                dMbmenu.toggleClass('open');
            };

        // mobile menu need
        if (!helper.isPC()) {
            dBody.addClass('mobile');
        }
        else
        {
            showLinksModal();
        }



        // show
        dMenu.bind('click', function () {
            if (helper.isPC()) {
                // pc
                //showLinksModal();
            } else {
                // mobile
                sliderMenu();
            }
        })

        dNav.find('.item').hover(function(){
            $(this).find('ol').delay(200).fadeIn();
        }, function(){
            $(this).find('ol').fadeOut();
        });


        // update catch targets
        linkCatch();
    }

    return {
        init : init
    }
})
