define([
    // libs
    'jQuery',
    'Handlebars',
    'lib/text!templates/album.html',
    'lib/text!templates/video.html',
    'lib/text!templates/weibo.html'
], function($, Handlebars, albumTpl, videoTpl, weiboTpl) {
    var dBody = $('body'),
        isUglyIe = $.browser.msie && $.browser.version <= 8,
        isIphone = navigator.userAgent.toLowerCase().indexOf('iphone') > 0,
        isIpad = navigator.userAgent.toLowerCase().indexOf('ipad') > 0,
        isAndroid = navigator.userAgent.indexOf('Android') >= 0,
        isMobile = isIphone || isIpad || isAndroid,
        sAlbum = Handlebars.compile(albumTpl)(),
        sVideo = Handlebars.compile(videoTpl)(),
        sWeibo = Handlebars.compile(weiboTpl)();

    var canAnimate = function () {
        if (isUglyIe || isMobile) {
            return false;
        } else {
            return true;
        }
    }

    var overlay = function (sHthml, func) {
        if (canAnimate()) {
            $.fancybox({
                openSpeed : 1000,
                closeSpeed : 1000,
                content: sHthml,
                closeClick: false,
                helpers: {
                    overlay: {
                        width: '100%',
                        height: '100%',
                        closeClick: false
                    }
                },
                beforeShow: function () {
                    // custom close function
                    dBody.delegate('.close', 'click', function() {
                        $.fancybox.close(true);
                    })

                    func();
                }
            })
        } else {
            $.fancybox({
                openSpeed : 0,
                closeSpeed : 0,
                content: sHthml,
                helpers: {
                    overlay: {
                        width: '100%',
                        height: '100%'
                    }
                },
                beforeShow: function () {
                    // custom close function
                    dBody.delegate('.close', 'click', function() {
                        $.fancybox.close(true);
                    })

                    func();
                }
            })
        }
    }

    var enableList = function() {
        // album list
        dBody.delegate('.album', 'click', function() {
            var bFunc = function() {
                    setTimeout(function() {
                        var jcarousel = $('.fancybox-inner .jcarousel'),
                            dPre = $('.jcarousel-control-prev'),
                            dNext = $('.jcarousel-control-next'),
                            dDesc = $('.actions .desc'),
                            nLength = $('.jcarousel .content li').length,
                            nIndex = 1,
                            updateDesc = function () {
                                if (nIndex <= 0 ) {
                                    nIndex = nLength;
                                }

                                if (nIndex > nLength){
                                    nIndex = 1;
                                }

                                dDesc.html(nIndex)
                            },
                            updateSize = function () {
                                var dWidth = $(window).width();
                                jcarousel.jcarousel('items').css('width', dWidth + 'px');
                            };

                        jcarousel.on('jcarousel:reload jcarousel:create', function() {
                            updateSize();
                        }).jcarousel({
                            wrap: 'circular'
                        });

                        dPre.jcarouselControl({
                            target: '-=1'
                        });

                        dNext.jcarouselControl({
                            target: '+=1'
                        });

                        // for dynamic title
                        dPre.bind('click', function () {
                            nIndex -= 1;
                            updateDesc()
                        })

                        dNext.bind('click', function () {
                            nIndex += 1;
                            updateDesc()
                        })

                        // auto resize
                        $('window').on('resize', function () {
                            updateSize();
                        })
                    }, 0)
                };

            overlay(sAlbum, bFunc);
        })

        // video list
        dBody.delegate('.video', 'click', function() {
            var bFunc = function() {
                    setTimeout(function() {
                        var jcarousel = $('.fancybox-inner .jcarousel'),
                            dPre = $('.jcarousel-control-prev'),
                            dNext = $('.jcarousel-control-next'),
                            dDesc = $('.actions .desc'),
                            nLength = $('.jcarousel .content li').length,
                            nIndex = 1,
                            updateDesc = function () {
                                if (nIndex <= 0 ) {
                                    nIndex = nLength;
                                }

                                if (nIndex > nLength){
                                    nIndex = 1;
                                }

                                dDesc.html(nIndex)
                            },
                            updateSize = function () {
                                var dWidth = $(window).width();
                                jcarousel.jcarousel('items').css('width', dWidth + 'px');
                            };

                        // jcarousel init
                        jcarousel.on('jcarousel:reload jcarousel:create', function() {
                            updateSize();
                        }).jcarousel({
                            wrap: 'circular'
                        });

                        dPre.jcarouselControl({
                            target: '-=1'
                        });

                        dNext.jcarouselControl({
                            target: '+=1'
                        });

                        // video stuff
                        var dVideo = jcarousel.find('video'),
                            stopPlay = function() {
                                var dLoading = jcarousel.find('.mejs-overlay-loading').parent();

                                // stop loading
                                dLoading.hide();

                                // stop play
                                dVideo.each(function() {
                                    $(this)[0].player.pause();
                                })
                            }

                        dVideo.mediaelementplayer()

                        // for dynamic title
                        dPre.bind('click', function () {
                            nIndex -= 1;
                            stopPlay();
                            updateDesc();
                        })

                        dNext.bind('click', function () {
                            nIndex += 1;
                            stopPlay();
                            updateDesc();
                        })

                        // auto resize
                        $('window').on('resize', function () {
                            updateSize();
                        })
                    }, 0)
                };

            overlay(sVideo, bFunc);
        })
    }

    var weibo = function() {
        dBody.delegate('.showy .showyitem', 'mouseenter', function() {
            var dWeibo,
                dTarget = $(this),
                nTop = parseInt(this.style.bottom);

            // set weibo content
            dTarget.html(sWeibo);

            dWeibo = dTarget.find('.weibo');

            // fadein
            dWeibo.fadeIn();

            // show weibo on bottom
            if (nTop > 50) {
                dWeibo.addClass('weibo_bottom');
            } else {
                // on top
                dWeibo.addClass('weibo_top');
            }

            // empty weibo content
            $(window).on('load resize scroll', function() {
                dWeibo.fadeOut();
            })

            dTarget.bind('mouseleave', function() {
                dWeibo.fadeOut();
            })
        })
    }

    var init = function() {
        // for album/photo list modals
        enableList();
        // for weibo mouse event
        weibo()
    }

    return {
        init: init,
        overlay : overlay,
        canAnimate : canAnimate
    }
})
