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
                city : '上海',
                title : 'SHANGHAI',
                name : '南京路店',
                address : '上海黄浦区南京东路588号世纪广场对面',
                phone : '187 567 987',
                geo : {
                    latitude : 31.440416,
                    longitude : 121.433701
                }
            },
            {
                city : '上海',
                title : 'SHANGHAI',
                name : '南京路店',
                address : '上海黄浦区南京东路588号世纪广场对面',
                phone : '187 567 987',
                geo : {
                    latitude : 31.460416,
                    longitude : 121.473701
                }
            },
            {
                city : '上海',
                title : 'SHANGHAI',
                name : '南京路店',
                address : '上海黄浦区南京东路588号世纪广场对面',
                phone : '187 567 987',
                geo : {
                    latitude : 31.230416,
                    longitude : 121.373701
                }
            },
            {
                city : '上海',
                title : 'SHANGHAI',
                name : '南京路店',
                address : '上海黄浦区南京东路588号世纪广场对面',
                phone : '187 567 987',
                geo : {
                    latitude : 31.270416,
                    longitude : 121.423701
                }
            },
            {
                city : '上海',
                title : 'SHANGHAI',
                name : '南京路店',
                address : '上海黄浦区南京东路588号世纪广场对面',
                phone : '187 567 987',
                geo : {
                    latitude : 31.290416,
                    longitude : 121.393701
                }
            }
        ];

        oConfig.success(fakeData);
    }

    return {
        getStorelocator : getStorelocator
    }
})
