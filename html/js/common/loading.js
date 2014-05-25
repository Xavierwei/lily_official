define([
    // libs
    'jQuery',
    'skrollr',
    'imagesLoaded'
], function($, skrollr, imagesLoaded) {
    var oRoll,
        oSkrollr = null,
        oPos = null,
        oMap = null,
        aMarkers = [],
        isMapCreate = false,
        dWrap = $('#wrap'),
        dLeft = $('.loading.left'),
        dBottom = $('.loading.bottom'),
        dRight = $('.loading.right'),
        dTop = $('.loading.top'),
        dTape = $('.showy'),
        oShop = {
            'shanghai': [
                {
                    latitude : 31.440416,
                    longitude : 121.433701
                },
                {
                    latitude : 31.460416,
                    longitude : 121.473701
                },
                {
                    latitude : 31.230416,
                    longitude : 121.373701
                },
                {
                    latitude : 31.270416,
                    longitude : 121.423701
                },
                {
                    latitude : 31.290416,
                    longitude : 121.393701
                }
            ]
        };

    // update map center
    var updateMapCenter = function (address) {
        if (isMapCreate) {
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    oMap.setCenter(results[0].geometry.location);
                }
            })
        }
    };

    // enable the select
    var selectInit = function () {
        var dHome = $('#home-selectbox'),
            dStore = $('#store-selectbox'),
            init = function (dWrap) {
                dWrap.find('select').change(function () {
                    var sVal = $(this).val(),
                        dTarget = $(this).prev().find(':first-child');

                    dTarget.html(sVal);

                    // update map center
                    updateMapCenter(sVal);
                })
            }

        if (dHome.length) {
            init(dHome)
        }

        if (dStore.length) {
            init(dStore)
        }
    }

    // init map
    var mapInit = function() {
        var dMap = $('#map'),
            dImg = dMap.find('img.map');

        if (!isMapCreate && dImg.length && window.google) {
            isMapCreate = true;

            var oLatlng = oPos ? oPos : new google.maps.LatLng(31.230416, 121.473701),
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
                    disableDefaultUI: true
                };

            oMap = new google.maps.Map(dMap.get(0), mapOptions);

            // add markers
            for (var i = 0; i < oShop['shanghai'].length; i++) {
                var oLocation = oShop['shanghai'][i],
                    oTmp = new google.maps.LatLng(oLocation['latitude'], oLocation['longitude']),
                    oMarker = new google.maps.Marker({
                        position: oTmp,
                        map: oMap,
                        animation: google.maps.Animation.DROP
                    });

                aMarkers.push(oMarker);
            }

            // Try HTML5 geolocation
            if (!oPos && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(data) {
                    oPos = new google.maps.LatLng(data.coords.latitude, data.coords.longitude);

                    oMap.setCenter(oPos);
                });
            }
        }
    }

    // the loading animation start
    var start = function() {
        var nTime = 300,
            nLoad = 0,
            nTotal = dWrap.find('img').length,
            imgLoad = imagesLoaded(dWrap);

        // enable selects
        selectInit()

        // need rebuild map
        isMapCreate = false;

        imgLoad.on('always', function(instance) {
            dTop.queue(function() {
                dTop.dequeue();

                dRight.css('height', '75%');
                dBottom.css('width', '90%');
                dLeft.css('height', '75%');

                dTop.animate({
                    'width': '90%'
                }, nTime, function() {
                    // show the page content
                    dWrap.fadeIn();

                    // show tapes
                    dTape.fadeIn();

                    // init map
                    mapInit()

                    if (oSkrollr) {
                        oSkrollr.refresh();
                    } else {
                        // let elements skroll
                        oSkrollr = skrollr.init({
                            edgeStrategy: 'set',
                            forceHeight: false
                        })
                    }
                })
            })
        })

        imgLoad.on('progress', function(instance, image) {
            nLoad += 1;

            var nVal = parseInt((nLoad / nTotal) * 100);

            if (0 < nVal && nVal < 25) {
                dRight.css({
                    'height': parseInt((nVal / 25) * 100) + '%'
                })

                return;
            }

            if (25 < nVal && nVal < 50) {
                dRight.css({
                    'height': '75%'
                })

                dBottom.css({
                    'width': parseInt((nVal / 50) * 100) + '%'
                })

                return;
            }

            if (50 < nVal && nVal < 75) {
                dBottom.css({
                    'width': '90%'
                })

                dLeft.css({
                    'height': parseInt((nVal / 75) * 100) + '%'
                })

                return;
            }

            if (75 < nVal && nVal < 100) {
                dLeft.css({
                    'height': '75%'
                })

                dTop.animate({
                    'width': parseInt((nVal / 100) * 100) + '%'
                }, nTime)

                return;
            }
        })
    }

    return {
        start: start,
        mapInit: mapInit
    }
})
