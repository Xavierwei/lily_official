define([
    // libs
    'jQuery',
    'Handlebars',
    'common/map',
    'common/api',
    'lib/text!templates/album.html',
    'lib/text!templates/video.html',
    'lib/text!templates/weibo.html'
], function($, Handlebars, map, api, albumTpl, videoTpl, weiboTpl) {
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

    var loadedAllImages = function( $imgs , fn ){
        var index = 0;
        $imgs.each(function(){
            $('<img/>').load(function(){
                index ++;
                if( index == $imgs.length )
                    fn();
            })
            .attr( 'src' , this.getAttribute('src') );
        });
    }

    var overlay = function (sHthml, func) {
        if (canAnimate()) {
            $.fancybox({
                openSpeed : 1000,
                closeSpeed : 1000,
                content: sHthml,
                closeClick: false,
                cyclic: true,
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
                    // after all image loaded, run the func
                    loadedAllImages( this.wrap.find('img') , func );
                }
            })
        } else {
            $.fancybox({
                openSpeed : 0,
                closeSpeed : 0,
                content: sHthml,
                cyclic: true,
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
            var imgIndex = $('.album').index( this );
            var bFunc = function(aData) {
                    var jcarousel = $('.fancybox-inner .jcarousel'),
                        dPre = $('.jcarousel-control-prev'),
                        dNext = $('.jcarousel-control-next'),
                        dDesc = $('.actions .desc'),
                        nLength = $('.jcarousel .content li').length,
                        nIndex = 0,
                        updateDesc = function () {
                            if (nIndex <= 0 ) {
                                nIndex = nLength;
                            }

                            if (nIndex > nLength){
                                nIndex = 1;
                            }

                            dDesc.html(aData[nIndex - 1].title);
                        };
                       // ,
                       // updateSize = function () {
                       //     jcarousel.jcarousel('items').css('height', '100%');
                       // };

                    jcarousel.on('jcarousel:create', function() {
                        // but i don't know why
                        jcarousel.jcarousel('items')
                            .find('img')
                            .css('width', '0');
                        setTimeout(function(){
                            jcarousel.jcarousel('items')
                                .find('img')
                                .css('width', 'auto');

                            jcarousel.jcarousel('scroll',  imgIndex , false );

                        } , 0 );
                    }).jcarousel({
                        wrap: 'circular',
                        center: true
                    });

                    dPre.jcarouselControl({
                        target: '-=1'
                    });

                    dNext.jcarouselControl({
                        target: '+=1'
                    });

                    // // for dynamic title
                    dPre.bind('click', function () {
                        nIndex -= 1;
                        updateDesc()
                    })

                    dNext.bind('click', function () {
                        nIndex += 1;
                        updateDesc()
                    })

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
                var imgIndex = $('.video').index( this );
                var jcarousel = $('.fancybox-inner .jcarousel'),
                    dPre = $('.jcarousel-control-prev'),
                    dNext = $('.jcarousel-control-next'),
                    dDesc = $('.actions .desc'),
                    nLength = $('.jcarousel .content li').length,
                    nIndex = 1,
                    updateDesc = function () {
                        // if (nIndex <= 0 ) {
                        //     nIndex = nLength;
                        // }

                        // if (nIndex >= nLength){
                        //     nIndex = 1;
                        // }

                        // dDesc.html(aData[nIndex - 1].title);
                    }
                    // ,
                    // updateSize = function () {
                    //     var dWidth = $(window).width();
                    //     jcarousel.jcarousel('items').css('width', dWidth + 'px');
                    // };

                // jcarousel init
                jcarousel.on('jcarousel:create', function() {
                    //updateSize();
                    jcarousel.jcarousel('items')
                        .find('img')
                        .css('width', '0');
                    setTimeout(function(){
                        jcarousel.jcarousel('items')
                            .find('img')
                            .css('width', 'auto');

                        jcarousel.jcarousel('scroll',  imgIndex , false );

                    } , 0 );
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
                // $('window').on('resize', function () {
                //     updateSize();
                // })
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
        dBody.delegate('.starshop .store_view', 'click', function() {
            $(this).parent().next().html('<a href="http://api.map.baidu.com/geocoder?address=上海虹桥机场&output=html" target="_blank"> <img src="http://api.map.baidu.com/staticimage? width=400&height=300&zoom=11¢er=上海虹桥机场" />');
        });
    }

    var globalEvent = function(){
        dBody.delegate('.gohash', 'click', function() {
            var hash = $(this).data('hash');
            var top = $('#'+hash).position().top - 140;
            $('html, body').animate({scrollTop : top});
        });

        dBody.delegate('.header .search', 'click', function() {
            $('.popup_overlay').fadeIn();
            $('.search_popup').fadeIn();
        });

        dBody.delegate('.popup_close,.popup_overlay', 'click', function() {
            $('.popup_overlay').fadeOut();
            $('.popup').fadeOut();
        });

        dBody.delegate('.search_popup .search_input', 'keyup', function(e) {
            if(e.keyCode == 13) {
                $('.search_popup .search_btn').trigger('click');
            }
        });

        dBody.delegate('.search_popup .search_btn', 'click', function() {
            var keyword = $('.search_popup .search_input').val();
            window.location.href = "search.php?keyword=" + keyword;
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

        globalEvent();
    }

    return {
        init: init,
        overlay : overlay,
        canAnimate : canAnimate,
        isPC : isPC
    }
})
