define([
    // libs
    'jQuery',
    'Handlebars',
    'lib/text!templates/album.html',
    'lib/text!templates/video.html',
    'lib/text!templates/weibo.html'
], function($, Handlebars, albumTpl, videoTpl, weiboTpl) {
    var dBody = $('body');

    var modals = function() {
        dBody.delegate('.album', 'click', function() {
            var sHthml = Handlebars.compile(albumTpl)();

            $.fancybox({
                content: sHthml,
                closeClick: false,
                helpers: {
                    overlay: {
                        width: '100%',
                        height: '100%',
                        closeClick: false,
                        css: {
                            'background': '#fff'
                        }
                    }
                },
                beforeShow: function() {
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
                }
            })
        })

        dBody.delegate('.video', 'click', function() {
            var sHthml = Handlebars.compile(videoTpl)();
            $.fancybox({
                content: sHthml,
                closeClick: false,
                helpers: {
                    overlay: {
                        width: '100%',
                        height: '100%',
                        closeClick: false,
                        css: {
                            'background': '#fff'
                        }
                    }
                },
                beforeShow: function() {
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
                }
            })
        })

        // for quick debug
        $($('.album')).click();
    }

    var weibo = function() {
        dBody.delegate('.showyitem', 'mouseenter', function() {
            var dTarget = $(this),
                nTop = parseInt(this.style.bottom),
                sHthml = Handlebars.compile(weiboTpl)();

            // set weibo content
            dTarget.html(sHthml);

            // show weibo on bottom
            if (nTop > 50) {
                dTarget.find('.weibo').addClass('weibo_bottom');
            } else {
                // on top
                dTarget.find('.weibo').addClass('weibo_top');
            }

            // empty weibo content
            $(window).on('load resize scroll', function() {
                dTarget.empty();
            })

            dTarget.bind('mouseleave', function() {
                dTarget.empty();
            })
        })
    }

    var init = function() {
        // for album/photo list modals
        modals();
        // for weibo mouse event
        weibo()
    }

    return {
        init: init
    }
})
