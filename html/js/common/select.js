define([
    // libs
    'jQuery',
    'common/map'
], function($, map) {
    var homeSelect = function (dHome) {
        var sAddress = map.getAddress(),
            dProvince = $('#province'),
            dCity = $('#city'),
            dProvinceSelect = dProvince.find('select'),
            dCitySelect = dCity.find('select'),
            dProvinceText = dProvince.find('.store_sl_txt'),
            dCityText = dCity.find('.store_sl_txt'),
            updateText = function () {
                setTimeout(function () {
                    var sProvince = dProvinceSelect.find('option:selected').text(),
                        sCity = dCitySelect.find('option:selected').text();

                    dProvinceText.html(sProvince);
                    dCityText.html(sCity);
                }, 100)
            };

        dHome.ChinaCitySelect({
            'prov' : dProvinceSelect,
            'city' : dCitySelect,
            'url' : 'data/city.json'
        })

        dProvinceSelect.change(function () {
            updateText();
        })

        dCitySelect.change(function () {
            updateText();
        })

        setTimeout(function () {
            // update choosed option
            dProvinceSelect.find('option').each(function(){
                if($(this).text() == sAddress) {
                    $(this).prop('selected', true);
                }
            })

            dProvinceSelect.change();
            dCitySelect.change();
        }, 300)
    }

    var starshopSelect = function (dStarshop) {
        var sAddress = map.getAddress(),
            dCountry = $('#country'),
            dProvince = $('#province'),
            dCity = $('#city'),
            dCountrySelect = dCountry.find('select'),
            dProvinceSelect = dProvince.find('select'),
            dCitySelect = dCity.find('select'),
            dProvinceText = dProvince.find('.store_sl_txt'),
            dCityText = dCity.find('.store_sl_txt'),
            updateText = function () {
                setTimeout(function () {
                    var sProvince = dProvinceSelect.find('option:selected').text(),
                        sCity = dCitySelect.find('option:selected').text();

                    dProvinceText.html(sProvince);
                    dCityText.html(sCity);
                }, 100)
            };

        dStarshop.ChinaCitySelect({
            'prov' : dProvinceSelect,
            'city' : dCitySelect,
            'url' : 'data/city.json'
        })

        dProvinceSelect.change(function () {
            updateText();
        })

        dCitySelect.change(function () {
            updateText();
        })

        setTimeout(function () {
            // update choosed option
            dProvinceSelect.find('option').each(function(){
                if ($(this).text() == sAddress) {
                    $(this).prop('selected', true);
                }
            })

            dProvinceSelect.change();
            dCitySelect.change();
        }, 300)
    }

    var storelocatorSelect = function (dStorelocator) {
        var sAddress = map.getAddress(),
            dCountry = $('#country'),
            dProvince = $('#province'),
            dCity = $('#city'),
            dDistrict = $('#district'),
            dCountrySelect = dCountry.find('select'),
            dProvinceSelect = dProvince.find('select'),
            dCitySelect = dCity.find('select'),
            dDistrictSelect = dDistrict.find('select'),
            dProvinceText = dProvince.find('.store_sl_txt'),
            dCityText = dCity.find('.store_sl_txt'),
            dDistrictText = dDistrict.find('.store_sl_txt'),
            updateText = function () {
                setTimeout(function () {
                    var sProvince = dProvinceSelect.find('option:selected').text(),
                        sCity = dCitySelect.find('option:selected').text(),
                        sDistrict = dDistrictSelect.find('option:selected').text();

                    dProvinceText.html(sProvince);
                    dCityText.html(sCity);
                    dDistrictText.html(sDistrict);
                }, 100)
            };

        dStorelocator.ChinaCitySelect({
            'prov' : dProvinceSelect,
            'city' : dCitySelect,
            'dist' : dDistrictSelect,
            'url' : 'data/city.json'
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

        setTimeout(function () {
            // update choosed option
            dProvinceSelect.find('option').each(function(){
                if ($(this).text() == sAddress) {
                    $(this).prop('selected', true);
                }
            })

            dProvinceSelect.change();
            dCitySelect.change();
            dDistrictSelect.change();
        }, 300)
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
