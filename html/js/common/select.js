define([
    // libs
    'jQuery',
    'Handlebars',
    'common/map',
    'common/api',
    'lib/text!templates/storelocator.html',
    'lib/text!templates/starshop.html'
], function($, Handlebars, map, api, storelocatorTpl, starshopTpl) {
    var dBody = $('body');

    var homeSelect = function (dHome) {
        var oAddress = map.getAddress(),
            dMap = $('#map'),
            dStores = $('.page_storelocator .stores'),
            dCountry = $('#country'),
            dProvince = $('#province'),
            dCity = $('#city'),
            dDistrict = $('#district'),
            dCountrySelect = dCountry.find('select'),
            dCountryText = dCountry.find('.store_sl_txt'),
            dProvinceSelect = dProvince.find('select'),
            dCitySelect = dCity.find('select'),
            dDistrictSelect = dDistrict.find('select'),
            dProvinceText = dProvince.find('.store_sl_txt'),
            dCityText = dCity.find('.store_sl_txt'),
            dDistrictText = dDistrict.find('.store_sl_txt'),
            dBtn = $('.page_storelocator .searchbtn'),
            sProvince,
            sCity,
            sDistrict,
            updateText = function () {
                setTimeout(function () {
                    sProvince = dProvinceSelect.find('option:selected').text();
                    sCity = dCitySelect.find('option:selected').text();
                    sDistrict = dDistrictSelect.find('option:selected').text();

                    dProvinceText.html(sProvince);
                    dCityText.html(sCity);
                    dDistrictText.html(sDistrict);

                    dProvinceText.data('val',sProvince);
                    dCityText.data('val',sCity);
                    dDistrictText.data('val',sDistrict);

                    var data = {country:'CN', city:dCityText.data('val'), star:0};
                    api.getStorelocator({
                        data:data,
                        success:function(aData){
                            map.updateMarkers(aData);
                        }
                    });
                }, 100)
            };

        oHandler = dHome.ChinaCitySelect({
            //'prov' : dProvinceSelect,
            'city' : dCitySelect,
            'dist' : dDistrictSelect,
            'url' : 'admin/index.php/api/shop/location',
            'success' : function(aData){
                setTimeout(function(){
                    dCityText.html(aData.city.CN[0]);
                    dCityText.data('val',aData.city.CN[0]);
                    updateText();
                },2000);
            }
        })

        dProvinceSelect.change(function () {
            updateText();
        })

        dCitySelect.change(function () {
            updateText();
        })

        dDistrictSelect.change(function () {
            updateText();
        })

        // when click the search button, should update the map center and markers
//        dBtn.bind('click', function () {
//            var data = {country:'CN', city:dCityText.data('val'), star:0};
//            api.getStorelocator({
//                data:data,
//                success:function(aData){
//                    var str = Handlebars.compile(storelocatorTpl)({
//                        title : aData[0].city,
//                        data : aData
//                    });
//                    dStores.html(str);
//                    map.updateMarkers(aData);
//                }
//            });
//        })

        // view map feature
        dStores.delegate('.store_additem .store_view', 'click', function () {
            var data = [{
                title: $(this).parent().find('p').eq(0).html(),
                address: $(this).parent().find('p').eq(1).html(),
                phone: $(this).parent().find('p').eq(2).html(),
                lat: $(this).data('lat'),
                lng: $(this).data('lng')
            }];
            map.updateMarkers(data);
            map.zoomMap(18);
            var height = $('#map').position().top;
            $('html,body').animate({scrollTop:height});
        })
    }

    var starshopSelect = function (dStarshop) {
        var oAddress = map.getAddress(),
            dBtn = $('.page_starshop .searchbtn'),
            dStores = $('.page_starshop .stores'),
            dCountry = $('#country'),
            dProvince = $('#province'),
            dCity = $('#city'),
            dCountrySelect = dCountry.find('select'),
            dProvinceSelect = dProvince.find('select'),
            dCitySelect = dCity.find('select'),
            dProvinceText = dProvince.find('.store_sl_txt'),
            dCityText = dCity.find('.store_sl_txt'),
            sProvince,
            sCity,
            bMap,
            updateText = function () {
                setTimeout(function () {
                    //sProvince = dProvinceSelect.find('option:selected').text();
                    sCity = dCitySelect.find('option:selected').text();

                    //dProvinceText.html(sProvince);
                    dCityText.html(sCity);
                }, 100)
            };

//        dStarshop.ChinaCitySelect({
//            //'prov' : dProvinceSelect,
//            'city' : dCitySelect,
//            'url' : 'admin/index.php/api/shop/location',
//            'success': function(aData){
////                setTimeout(function(){
////                    dCityText.html(aData.city.CN[0]);
////                    dCitySelect.trigger('change');
////                },2000);
//            }
//        })

//        dProvinceSelect.change(function () {
//            updateText();
//        })

//        dCitySelect.change(function () {
//            updateText();
//            setTimeout(function(){
//                var data = {country:'CN', city:dCityText.html(), star:1};
//                api.getStorelocator({
//                    data:data,
//                    success:function(aData){
//                        Handlebars.registerHelper('if_even', function(conditional, options) {
//                            if((conditional % 2) == 0) {
//                                return options.fn(this);
//                            } else {
//                                return options.inverse(this);
//                            }
//                        });
//                        var str = Handlebars.compile(starshopTpl)({
//                            data : aData
//                        });
//                        dStores.html(str);
//                    }
//                });
//            },200);
//        })

        dCitySelect.change(function () {
            updateText();
            var hash = dCitySelect.val();
            var top = $('#'+hash).position().top - 100;
            $('html, body').animate({scrollTop : top});
        });

        // when click the search button, should the tpl
        dBtn.bind('click', function () {
            api.getStarshop({
                path : 'xxx',
                method : 'get',
                data : {
                    province : sProvince,
                    city : sCity
                },
                success : function (aData) {
                    var nSize = aData.length;

                    // need do some trik for display order
                    for (var i = 0; i < nSize; i++) {
                        if (i % 2) {
                            aData[i].contentClass = 'right';
                            aData[i].imageClass = 'left';
                        } else {
                            aData[i].contentClass = 'left';
                            aData[i].imageClass = 'right';
                        }

                        if (i == (nSize - 1)) {
                            // update page store tpl
                            var str = Handlebars.compile(starshopTpl)({
                                data : aData
                            });

                            dStores.html(str);
                        }
                    }
                }
            })
        })

        // the callback hell is caused with browse need sometime to render those options
//        setTimeout(function () {
//            var dProvinceOptions = dProvinceSelect.find('option'),
//                nProvince = dProvinceOptions.length;
//
//            // update choosed option
//            dProvinceOptions.each(function(index, item){
//                if ($(this).text().indexOf(oAddress.province) >= 0) {
//                    $(this).prop('selected', true);
//                }
//
//                if (index == nProvince - 1) {
//                    setTimeout(function () {
//                        var dCityOptions = dCitySelect.find('option'),
//                            nCity = dCityOptions.length;
//
//                        dCityOptions.each(function(){
//                            if ($(this).text().indexOf(oAddress.city) >= 0) {
//                                $(this).prop('selected', true);
//                            }
//                        })
//
//                        // update the ui
//                        dProvinceSelect.change();
//                        dCitySelect.change();
//                    }, 30)
//                }
//            })
//        }, 300)


        // view map feature
        dStores.delegate('.store_view', 'click', function () {
            var mapWrap = $(this).parents('.limit').find('.starshop_map');
            if(mapWrap.find('#map').length > 0) {
                $(this).html('View Map');
                $("#map").fadeOut(function(){
                    $(this).remove();
                });
            }
            else {
                $("#map").remove();
                $(this).html('View Shop');
                var data = [{
                    title: $(this).parent().find('h2').eq(0).html(),
                    address: $(this).parent().find('p').eq(1).html(),
                    phone: $(this).parent().find('p').eq(2).html(),
                    lat: $(this).data('lat'),
                    lng: $(this).data('lng')
                }];
                mapWrap.append('<div id="map"></div>');
                $('#map').css({width:mapWrap.width(),height:mapWrap.height()});
                setTimeout(function(){
                    bMap = new BMap.Map("map");
                    bMap.addControl(new BMap.NavigationControl());
                    var point = new BMap.Point(data[0].lat,data[0].lng);
                    var marker = new BMap.Marker(point, {title:data[0].title});
                    bMap.centerAndZoom(point, 15);
                    bMap.addOverlay(marker);
                },1000);
            }
        })
    }

    var storelocatorSelect = function (dStorelocator) {
        var oAddress = map.getAddress(),
            dMap = $('#map'),
            dStores = $('.page_storelocator .stores'),
            dCountry = $('#country'),
            dProvince = $('#province'),
            dCity = $('#city'),
            dDistrict = $('#district'),
            dCountrySelect = dCountry.find('select'),
            dCountryText = dCountry.find('.store_sl_txt'),
            dProvinceSelect = dProvince.find('select'),
            dCitySelect = dCity.find('select'),
            dDistrictSelect = dDistrict.find('select'),
            dProvinceText = dProvince.find('.store_sl_txt'),
            dCityText = dCity.find('.store_sl_txt'),
            dDistrictText = dDistrict.find('.store_sl_txt'),
            dBtn = $('.page_storelocator .searchbtn'),
            sProvince,
            sCity,
            sDistrict,
            updateText = function () {
                setTimeout(function () {
                    sProvince = dProvinceSelect.find('option:selected').text();
                    sCity = dCitySelect.find('option:selected').text();
                    sDistrict = dDistrictSelect.find('option:selected').text();

                    dProvinceText.html(sProvince);
                    dCityText.html(sCity);
                    dDistrictText.html(sDistrict);

                    dProvinceText.data('val',sProvince);
                    dCityText.data('val',sCity);
                    dDistrictText.data('val',sDistrict);
                }, 100)
            },
            searchShop = function (findNear) {
                var data = {country:'CN', city:dCityText.data('val'), distinct:dDistrictText.data('val'), star:0};
                api.getStorelocator({
                    data:data,
                    success:function(aData){
                        var str = Handlebars.compile(storelocatorTpl)({
                            title : aData.shopes[0].city,
                            data : aData.shopes
                        });
                        dStores.html(str);
                        if(findNear && aData.min_distance_shop) {
                            map.updateMarkers(aData.shopes, false);
                            map.centerZoom(aData.min_distance_shop.lat, aData.min_distance_shop.lng, 20);
                        }
                        else {
                            map.updateMarkers(aData.shopes, true);
                        }
                    }
                });
            }

        oHandler = dStorelocator.ChinaCitySelect({
            //'prov' : dProvinceSelect,
            'city' : dCitySelect,
            'dist' : dDistrictSelect,
            'url' : 'admin/index.php/api/shop/location',
            'success' : function(aData){
                setTimeout(function(){
                    dCityText.html(aData.user_city);
                    dCityText.data('val',aData.user_city);
                    searchShop(true);
                },2000);
            }
        })

        dProvinceSelect.change(function () {
            updateText();
        })

        dCitySelect.change(function () {
            updateText();
        })

        dDistrictSelect.change(function () {
            updateText();
        })

        // when click the search button, should update the map center and markers
        dBtn.bind('click', function () {
            searchShop(false);
        })

        // view map feature
        dStores.delegate('.store_additem .store_view', 'click', function () {
            var data = [{
                title: $(this).parent().find('p').eq(0).html(),
                address: $(this).parent().find('p').eq(1).html(),
                phone: $(this).parent().find('p').eq(2).html(),
                lat: $(this).data('lat'),
                lng: $(this).data('lng')
            }];
            map.updateMarkers(data);
            map.zoomMap(18);
            var height = $('#map').position().top;
            $('html,body').animate({scrollTop:height});
        })
    }

    // enable the select
    var init = function () {
        var dHome = $('.index #home-selectbox'),
            dStarshop = $('.starshop #store-selectbox'),
            dStorelocator = $('.storelocator #store-selectbox');

        // home page, the city select is display none, we need it
        if (dHome.length) {
            homeSelect(dHome);
        }

        // starshop page
        if (dStarshop.length) {
            starshopSelect(dStarshop);
        }

        // storelocator page
        if (dStorelocator.length) {
            storelocatorSelect(dStorelocator);
        }
    }

    return {
        init : init
    }
})
