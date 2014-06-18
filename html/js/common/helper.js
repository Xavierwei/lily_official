define([
    // libs
    'jQuery',
    'Handlebars',
    'common/api',
    'lib/text!templates/album.html',
    'lib/text!templates/video.html',
    'lib/text!templates/weibo.html'
], function($, Handlebars, api, albumTpl, videoTpl, weiboTpl) {
    var dBody = $('body'),
        isUglyIe = $.browser.msie && $.browser.version <= 8,
        isIphone = navigator.userAgent.toLowerCase().indexOf('iphone') > 0,
        isIpad = navigator.userAgent.toLowerCase().indexOf('ipad') > 0,
        isAndroid = navigator.userAgent.indexOf('Android') >= 0,
        isMobile = isIphone || isIpad || isAndroid,
        sWeibo = (function () {
            var str = '';

            api.getWeibo({
                success : function (oData) {
                    str = Handlebars.compile(weiboTpl)(oData);
                }
            })

            return str;
        })();

    var isPC = function () {
        if (isMobile) {
            return false;
        } else {
            return true;
        }
    }

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
            var bFunc = function(aData) {
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

                                dDesc.html(aData[nIndex - 1].title);
                            };
//                            ,
//                            updateSize = function () {
//                                var dWidth = $(window).width();
//                                jcarousel.jcarousel('items').css('width', dWidth + 'px');
//                            };

                        jcarousel.on('jcarousel:reload jcarousel:create', function() {
                            //updateSize();
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

            var albumId = $(this).data('album');
            if(albumId == undefined) albumId = 1;
            api.getAlbumList({
                data : { id : albumId },
                success : function (aData) {
                    var sAlbum = Handlebars.compile(albumTpl)({ data : aData });

                    overlay(sAlbum, function () {
                        bFunc(aData);
                    });
                }
            })
        })

        // video list
        dBody.delegate('.video', 'click', function() {
            var bFunc = function(aData) {
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

                                dDesc.html(aData[nIndex - 1].title);
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

            api.getVideoList({
                data : { id : '1231313' },
                success : function (aData) {
                    var sVideo = Handlebars.compile(videoTpl)({ data : aData });

                    overlay(sVideo, function () {
                        bFunc(aData);
                    });
                }
            })
        })
    }

    var weibo = function() {
        var dShowyitem = $('.showy .showyitem');

        dBody.delegate('.showy .showyitem', 'mouseenter', function() {
            var dWeibo,
                dTarget = $(this),
                nTop = parseInt(this.style.bottom);

            // clear old weibos
            dShowyitem.html();

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

    var campaignEvent = function() {
        dBody.delegate('.go_play_ground', 'click', function() {
            var top = $('#play_ground').position().top - 140;
            $('html, body').animate({scrollTop : top});
        });
    }

    var mapEvent = function() {
        dBody.delegate('.store_view', 'click', function() {
            $(this).parent().next().html('<a href="http://api.map.baidu.com/geocoder?address=上海虹桥机场&output=html" target="_blank"> <img src="http://api.map.baidu.com/staticimage? width=400&height=300&zoom=11¢er=上海虹桥机场" />');
        });
    }

    var init = function() {
        // for album/photo list modals
        enableList();
        // for weibo mouse event
        //weibo();
        // campaign event
        campaignEvent();

        // for map
        mapEvent();
    }

    return {
        init: init,
        overlay : overlay,
        canAnimate : canAnimate,
        isPC : isPC
    }
})
