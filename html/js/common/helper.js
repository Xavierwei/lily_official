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
                            dWidth = $(window).width(),
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
                            };

                        jcarousel.on('jcarousel:reload jcarousel:create', function() {
                            jcarousel.jcarousel('items').css('width', dWidth + 'px');
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
                            dWidth = $(window).width(),
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
                            };

                        // jcarousel init
                        jcarousel.on('jcarousel:reload jcarousel:create', function() {
                            jcarousel.jcarousel('items').css('width', dWidth + 'px');
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
                    }, 0)
                }
            })
        })

        // for quick debug
        // $($('.video')).click();
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
