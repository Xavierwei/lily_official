define(['jquery', 'helper', 'html', 'jquery.address'], function($, helper, html) {
    var initialize = function () {
        var dCur,
            sUrl = location.href,
            dNav = $('.header .nav'),
            dMenu = dNav.find('a[title]');

        // if start with a specfic html page, automatically update to hash page
        if (sUrl.match(/\.html$/g)) {
            var aUrl = sUrl.split('/'),
                sVal = aUrl[aUrl.length - 1].split('.')[0];

            $.address.value(sVal);
        }

        // if start with empty hash, also automatically update to hash page
        if ($.address.value() == '/') {
            $.address.value('index');
        }

        // Address handler
        $.address.init(function(evt) {
            var sVal = helper.getHash(evt.value);

            // todo
            // show menu and loading stuff

            // switch menu url to hash mode
            dMenu.each(function (nIndex, dEl) {
                var dTmp = $(dEl),
                    sTitle = dTmp.attr('title');

                dTmp.attr('href', '#' + sTitle);

                if (sTitle == sVal) {
                    dTmp.addClass('on');
                    dCur = dTmp;
                }
            })

            // update active class
            dMenu.bind('click', function (e) {
                var dTarget = $(this);

                // prevent click the active effect
                if (dTarget.hasClass('on')) {
                    e.preventDefault();
                    return;
                }

                dCur.removeClass('on');

                dCur = dTarget;

                dCur.addClass('on');
            })
        }).change(function(evt) {
            // request html
            html(helper.getHash(evt.value), function (dHtml) {
                $('.page').replaceWith(dHtml.find('.page'));
                $('.showy').replaceWith(dHtml.find('.showy'));
            })
        })
    }

    return initialize;
})
