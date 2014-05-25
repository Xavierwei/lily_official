define([
    // libs
    'jQuery',
    'Handlebars',
    // apps
    'common/loading',
    'lib/text!templates/links.html'
], function($, Handlebars, loading, linksTpl) {
    var sPath = location.pathname,
        sCur = sPath.replace(sPath.match(/^.*\html\//), ''),
        isNext,
        isAnimate = false,
        dBody = $('body'),
        dWrap = $('#wrap'),
        dLoading = $('.loading'),
        dTape = $('.showy');

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

    // when animate end html the wrap
    var setContent = function (str) {
        var timer,
            setHtml = function () {
                dWrap.html(str);
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
                pageAnimate();
            },
            success: function(str) {
                var dHtml = $('<div>' + str + '</div>');

                setContent(dHtml.find('#wrap').html())
            }
        })
    }

    var init = function () {
        var dMenu = $('.header .menu'),
            sHthml = Handlebars.compile(linksTpl)(),
            showLinksModal = function () {
                $.fancybox({
                    content: sHthml,
                    closeClick: false,
                    helpers: {
                        overlay: {
                            width: '100%',
                            height: '100%',
                            closeClick: false
                        }
                    },
                    beforeShow: function() {
                        setTimeout(function() {
                            var dOverlay = $('.fancybox-overlay');

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
                })
            };

        // show
        dMenu.bind('click', function () {
            showLinksModal();
        })

        // for quick debug
        // dMenu.click();
    }

    return {
        init : init
    }
})
