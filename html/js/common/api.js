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

    return {
        getStorelocator : getStorelocator,
        getStarshop : getStarshop
    }
})
