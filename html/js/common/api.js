define([
    // libs
    'jQuery'
], function($) {
    var requset = function (oConfig) {
        $.ajax({
            url : '' + oConfig.path,
            method : oConfig.method,
            data : oConfig.data ? oConfig.data : {},
            success: function(data) {
                oConfig.success(data);
            },
            error: function (err) {
                oConfig.failure(err);
            }
        })
    }

    // data format: { latitude : xxxx, longitude : xxxxx }
    var getStorelocator = function (oConfig) {
        requset({
             path : 'admin/index.php/api/shop/search',
             method : 'get',
             data : oConfig.data,
             success : function (data) {
                 oConfig.success(data.data);
             },
             failure : function (err) {
                 oConfig.failure(err);
             }
        })
    }

    // data format: { province : sProvince, city : sCity }, may need country name
    var getStarshop = function (oConfig) {
        // requset({
        //     path : 'xxx',
        //     method : 'get',
        //     data : oConfig.data,
        //     success : function (data) {
        //         oConfig.success(data);
        //     },
        //     failure : function (err) {
        //         oConfig.failure(err);
        //     }
        // })

        var fakeData = [
            {
                city : '南京',
                title : '上海南京路店',
                name : '南京路店',
                address : 'xxxxxxxxxxxxxxxxx',
                phone : '187 567 987',
                image : 'images/wlmq_bj_star.jpg',
                geo : {
                    latitude : 31.440416,
                    longitude : 121.433701
                }
            },
            {
                city : '南京',
                title : 'SHANGHAI',
                name : '南京路店',
                address : 'xxxxxxxx',
                phone : '187 567 987',
                image : 'images/sh_njl_star.jpg',
                geo : {
                    latitude : 31.460416,
                    longitude : 121.473701
                }
            }
        ];

        oConfig.success(fakeData);
    }

    // data format: { id : xxxx }, the series id
    var getAlbumList = function (oConfig) {
        // requset({
        //     path : 'xxx',
        //     method : 'get',
        //     data : oConfig.data,
        //     success : function (data) {
        //         oConfig.success(data);
        //     },
        //     failure : function (err) {
        //         oConfig.failure(err);
        //     }
        // })

        var lookbook1 = [
            {
                url : 'pic/lookbook/garden/850_850/1.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/2.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/3.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/4.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/5.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/6.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/7.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/8.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/16.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/18.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/19.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/20.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/21.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/22.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/23.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/35.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/36.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/37.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/38.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/39.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/41.jpg',
                title : 'Garden'
            },
            {
                url : 'pic/lookbook/garden/850_850/42.jpg',
                title : 'Garden'
            }
        ]

        var lookbook2 = [
            {
                url : 'pic/lookbook/modernart/850_850/28.jpg',
                title : 'Modernart'
            },
            {
                url : 'pic/lookbook/modernart/850_850/29.jpg',
                title : 'Modernart'
            },
            {
                url : 'pic/lookbook/modernart/850_850/30.jpg',
                title : 'Modernart'
            },
            {
                url : 'pic/lookbook/modernart/850_850/31.jpg',
                title : 'Modernart'
            },
            {
                url : 'pic/lookbook/modernart/850_850/32.jpg',
                title : 'Modernart'
            },
            {
                url : 'pic/lookbook/modernart/850_850/33.jpg',
                title : 'Modernart'
            },
            {
                url : 'pic/lookbook/modernart/850_850/34.jpg',
                title : 'Modernart'
            },
            {
                url : 'pic/lookbook/modernart/850_850/40.jpg',
                title : 'Modernart'
            }
        ]

        var lookbook3 = [
            {
                url : 'pic/lookbook/ocean/850_850/9.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/10.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/11.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/12.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/13.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/14.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/15.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/24.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/25.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/26.jpg',
                title : 'Ocean'
            },
            {
                url : 'pic/lookbook/ocean/850_850/27.jpg',
                title : 'Ocean'
            }
        ]

        var streetshot = [
            {
                url : 'pic/streetshot/850_850/1.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/2.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/3.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/4.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/5.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/6.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/7.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/8.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/9.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/10.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/11.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/12.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/13.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/6.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/7.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/8.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/9.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/10.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/11.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/12.jpg',
                title : 'Streetshot'
            },
            {
                url : 'pic/streetshot/850_850/13.jpg',
                title : 'Streetshot'
            }
        ]

        var campaign = [
            {
                url : 'pic/campaign/1.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/2.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/3.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/4.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/5.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/6.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/7.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/8.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/9.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/10.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/11.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/12.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/13.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/14.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/15.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/16.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/17.jpg',
                title : 'Campaign'
            },
            {
                url : 'pic/campaign/18.jpg',
                title : 'Campaign'
            }
        ]

        if(oConfig.data.id==5) {
            oConfig.success(streetshot);
        }
        if(oConfig.data.id==1) {
            oConfig.success(lookbook1);
        }
        if(oConfig.data.id==2) {
            oConfig.success(lookbook2);
        }
        if(oConfig.data.id==3) {
            oConfig.success(lookbook3);
        }
        if(oConfig.data.id==4) {
            oConfig.success(campaign);
        }

    }

    // data format: { id : xxxx }, the series id
    var getVideoList = function (oConfig) {
        // requset({
        //     path : 'xxx',
        //     method : 'get',
        //     data : oConfig.data,
        //     success : function (data) {
        //         oConfig.success(data);
        //     },
        //     failure : function (err) {
        //         oConfig.failure(err);
        //     }
        // })

        var fakeData = [
            {
                mp4 : 'media/demo.mp4',
                webm : 'media/demo.webm',
                ogv : 'media/demo.ogv',
                poster : 'media/demo.jpg',
                title : 'video1'
            },
            {
                mp4 : 'media/demo.mp4',
                webm : 'media/demo.webm',
                ogv : 'media/demo.ogv',
                poster : 'media/demo.jpg',
                title : 'video2'
            }
        ]

        oConfig.success(fakeData);
    }

    var getWeibo = function (oConfig) {
        // requset({
        //     path : 'xxx',
        //     method : 'get',
        //     success : function (data) {
        //         oConfig.success(data);
        //     },
        //     failure : function (err) {
        //         oConfig.failure(err);
        //     }
        // })

        var fakeData = {
            date : 'Monday 23 may',
            content : '年轻OL的商务着装，可能太严肃，可能太时髦，或者像Lily这样正合适 作为年轻OL商务时装的开创者'
        }

        oConfig.success(fakeData);
    }

    // data format: { id : xxxx }, the news id
    var getNews = function (oConfig) {
        // requset({
        //     path : 'xxx',
        //     method : 'get',
        //     data : oConfig.data,
        //     success : function (data) {
        //         oConfig.success(data);
        //     },
        //     failure : function (err) {
        //         oConfig.failure(err);
        //     }
        // })

        var fakeData = {
            image : 'images/event_img.jpg',
            title : '中国零售业可持续发展创新模式高峰论坛',
            date : '2013年5月30日',
            content : '"中国零售业可持续发展创新模式高峰论坛" 是由上海丝绸集团旗品牌发展有限公司(Lily品牌)主办，中国商业地产协会、第一财经频道/第一地产、搜狐网财经频道、零点研究咨询集团（上海）协办的一场零售业高峰论坛。论坛以“店商vs电商: 商机再造，谁主未来？" 为主题，汇聚了来自全国的近400名企业领袖、行业专家、电商精英及各界媒体，针对当下中国零售业面临的全新商业格局进行探讨辨析，为实体零售业的未来发展出谋献策。'
        }

        oConfig.success(fakeData);
    }

    var setCookie = function(name, value, expire, path, domain, s){
        if ( document.cookie === undefined ){
            return false;
        }

        if (expire < 0){
            value = '';
        }

        var dt = new Date();
        dt.setTime(dt.getTime() + 1000 * expire);

        document.cookie = name + "=" + encodeURIComponent(value) +
            ((expire) ? "; expires=" + dt.toGMTString() : "") +
            ((s) ? "; secure" : "");

        return true;
    };

    var removeCookie = function(name, path, domain){
        return setCookie(name, '', -1, path, domain);
    };

    return {
        getStorelocator : getStorelocator,
        getStarshop : getStarshop,
        getAlbumList : getAlbumList,
        getVideoList : getVideoList,
        getWeibo : getWeibo,
        getNews : getNews,
        setCookie : setCookie,
        removeCookie : removeCookie
    }
})
