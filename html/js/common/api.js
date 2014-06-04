define([
    // libs
    'jQuery'
], function($) {
    var requset = function (oConfig) {
        $.ajax({
            url : 'xxx/' + oConfig.path,
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
                title : 'SHANGHAI',
                name : '南京路店',
                address : 'xxxxxxxxxxxxxxxxx',
                phone : '187 567 987',
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
                geo : {
                    latitude : 31.460416,
                    longitude : 121.473701
                }
            },
            {
                city : '南京',
                title : 'SHANGHAI',
                name : '南京路店',
                address : 'xxxxxxxxxxxxxxxxx',
                phone : '187 567 987',
                geo : {
                    latitude : 31.230416,
                    longitude : 121.373701
                }
            },
            {
                city : '南京',
                title : 'SHANGHAI',
                name : '南京路店',
                address : 'xxxxxxxxxxxxxxxxx',
                phone : '187 567 987',
                geo : {
                    latitude : 31.270416,
                    longitude : 121.423701
                }
            },
            {
                city : '南京',
                title : 'SHANGHAI',
                name : '南京路店',
                address : 'xxxxxxxxxxxxxxxxx',
                phone : '187 567 987',
                geo : {
                    latitude : 31.290416,
                    longitude : 121.393701
                }
            }
        ];

        oConfig.success(fakeData);
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

        var fakeData = [
            {
                url : 'images/home_img4.jpg',
                title : 'Pic1'
            },
            {
                url : 'images/cp_blankimg5.jpg',
                title : 'Pic2'
            }
        ]

        oConfig.success(fakeData);
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

    return {
        getStorelocator : getStorelocator,
        getStarshop : getStarshop,
        getAlbumList : getAlbumList,
        getVideoList : getVideoList,
        getWeibo : getWeibo,
        getNews : getNews
    }
})
