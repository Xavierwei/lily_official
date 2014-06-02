define([
    // libs
    'jQuery',
    'common/api'
], function($, api) {
    var oPos = {
            latitude : 31.230416,
            longitude : 121.473701
        },
        sAddress = '上海市',
        oGeocoder = null,
        oMap = null,
        aMarkers = [];

    // update map center
    var updateMapCenter = function () {
        if (oMap) {
            var latlng = new google.maps.LatLng(oPos.latitude, oPos.longitude);

            oMap.setCenter(latlng);
        }
    };

    // using address to get latlng info
    var getLatLng = function (address) {
        if (oGeocoder) {
            oGeocoder.geocode( { 'address': address }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    oPos = results[0].geometry.location;
                }
            })
        }
    }

    // using address to get latlng info, just use once when gps success
    var updateAddress = function () {
        if (oGeocoder) {
            var latLng = new google.maps.LatLng(oPos.latitude, oPos.longitude);

            oGeocoder.geocode({ 'latLng' : latLng }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var sCity = results[0].address_components[5].long_name;

                    if (sCity) {
                        sAddress = sCity;
                    }
                }
            })
        }
    }

    // clear old markers
    var clearMarkers = function () {
        for (var i = 0; i < aMarkers.length; i++) {
            aMarkers[i].setMap(null);
            aMarkers = [];
        }
    }

    // update markers
    var updateMarkers = function () {
        // add markers
        if (oMap) {
            // clear old markers
            clearMarkers();

            api.getStorelocator({
                path : 'xxx',
                method : 'get',
                data : oPos,
                success : function (aData) {
                    for (var i = 0; i < aData.length; i++) {
                        var oTmp = new google.maps.LatLng(
                                aData[i]['geo']['latitude'],
                                aData[i]['geo']['longitude']
                            ),
                            oMarker = new google.maps.Marker({
                                position: oTmp,
                                map: oMap,
                                animation: google.maps.Animation.DROP
                            });

                        aMarkers.push(oMarker);
                    }
                }
            })
        }
    }

    // init map
    var init = function() {
        var dMap = $('#map'),
            dImg = dMap.find('img.map'),
            isGoogleReady = window.google && window.google.maps && google.maps.LatLng;

        // reset all status
        oGeocoder = null;
        oMap = null;
        aMarkers = [];

        if (dImg.length && isGoogleReady) {
            // default is shanghai
            var oLatlng = new google.maps.LatLng(oPos.latitude, oPos.longitude),
                mapOptions = {
                    zoom: 12,
                    center: oLatlng,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                    },
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.SMALL
                    },
                    scrollwheel: false,
                    disableDefaultUI: true
                };

            // geocoder instance
            oGeocoder = new google.maps.Geocoder();

            // map instance
            oMap = new google.maps.Map(dMap.get(0), mapOptions);

            // try to update map center
            updateMapCenter();

            // update markers
            updateMarkers();
        }
    }

    // get gps position, just fired when open the page
    var getPosition = function () {
        // Try HTML5 geolocation, default is shanghai
        if (window.navigator && window.navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(data) {
                oPos = {
                    latitude : data.coords.latitude,
                    longitude : data.coords.longitude
                }

                updateAddress();
            })
        }
    }

    var getAddress = function () {
        return sAddress;
    }

    return {
        init : init,
        getLatLng : getLatLng,
        getPosition : getPosition,
        getAddress : getAddress,
        updateMarkers : updateMarkers,
        updateMapCenter : updateMapCenter
    }
})
